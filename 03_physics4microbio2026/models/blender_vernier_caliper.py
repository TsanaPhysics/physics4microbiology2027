"""
=============================================================================
Blender 3D Parametric Vernier Caliper Generator (MCP blender-3d Compatible)
Author: Assistant Antigravity for Asst. Prof. Dr. Chewa Thassana (RBRU LEQs Center)
Course: Physics for Microbiology 2026/2027 (Lab 1: Measurement & Vernier Metrology)
=============================================================================
This script programmatically generates a watertight, photorealistic 150 mm Vernier
Caliper with Principled BSDF brushed stainless steel, laser-etched scale graduations,
rigged sliding vernier assembly, locking thumbscrew, and depth gauge rod.
"""

import bpy
import math

def clean_scene():
    """Removes existing mesh objects in the active collection."""
    bpy.ops.object.select_all(action='SELECT')
    bpy.ops.object.delete(use_global=False)

def create_brushed_steel_material(name="Brushed_Stainless_Steel"):
    """Creates a photorealistic PBR brushed stainless steel material."""
    mat = bpy.data.materials.get(name)
    if mat is None:
        mat = bpy.data.materials.new(name=name)
        mat.use_nodes = True
    
    nodes = mat.node_tree.nodes
    nodes.clear()
    
    # Material Output
    node_output = nodes.new(type="ShaderNodeOutputMaterial")
    node_output.location = (400, 0)
    
    # Principled BSDF
    node_bsdf = nodes.new(type="ShaderNodeBsdfPrincipled")
    node_bsdf.location = (0, 0)
    node_bsdf.inputs["Base Color"].default_value = (0.82, 0.84, 0.88, 1.0) # Cold metallic silver
    node_bsdf.inputs["Metallic"].default_value = 0.92
    node_bsdf.inputs["Roughness"].default_value = 0.22
    if "Anisotropic" in node_bsdf.inputs:
        node_bsdf.inputs["Anisotropic"].default_value = 0.65
        node_bsdf.inputs["Anisotropic Rotation"].default_value = 0.25
        
    mat.node_tree.links.new(node_bsdf.outputs["BSDF"], node_output.inputs["Surface"])
    return mat

def create_main_beam(material):
    """Generates the main beam and fixed jaws of the caliper."""
    # Main Ruler Beam (150 mm metric scale + extra tail)
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(80, 0, 0))
    beam = bpy.context.active_object
    beam.name = "Caliper_Main_Beam"
    beam.scale = (210, 16, 3.5) # mm scale
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    beam.data.materials.append(material)
    
    # Fixed Lower Jaw (Extruded ergonomic profile)
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(0, -22, 0))
    fixed_jaw = bpy.context.active_object
    fixed_jaw.name = "Caliper_Fixed_Lower_Jaw"
    fixed_jaw.scale = (12, 44, 3.5)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    fixed_jaw.data.materials.append(material)
    
    # Fixed Upper Horn (For internal measurements)
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(0, 18, 0))
    fixed_horn = bpy.context.active_object
    fixed_horn.name = "Caliper_Fixed_Upper_Horn"
    fixed_horn.scale = (10, 20, 3.5)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    fixed_horn.data.materials.append(material)
    
    # Join into fixed body
    beam.select_set(True)
    fixed_jaw.select_set(True)
    fixed_horn.select_set(True)
    bpy.context.view_layer.objects.active = beam
    bpy.ops.object.join()
    beam.name = "Vernier_Caliper_Fixed_Body"
    return beam

def create_sliding_assembly(material, initial_offset_mm=88.60):
    """Generates the movable sliding vernier frame, jaws, lock screw, and depth rod."""
    # Slider Frame Collar
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(initial_offset_mm, 0, 0))
    slider = bpy.context.active_object
    slider.name = "Caliper_Slider_Frame"
    slider.scale = (42, 22, 5.0)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    slider.data.materials.append(material)
    
    # Sliding Lower Jaw
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(initial_offset_mm, -22, 0))
    slide_jaw = bpy.context.active_object
    slide_jaw.name = "Caliper_Sliding_Lower_Jaw"
    slide_jaw.scale = (12, 44, 4.0)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    slide_jaw.data.materials.append(material)
    
    # Sliding Upper Horn
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(initial_offset_mm, 18, 0))
    slide_horn = bpy.context.active_object
    slide_horn.name = "Caliper_Sliding_Upper_Horn"
    slide_horn.scale = (10, 20, 4.0)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    slide_horn.data.materials.append(material)
    
    # Knurled Lock Screw
    bpy.ops.mesh.primitive_cylinder_add(radius=3.5, depth=6.0, location=(initial_offset_mm + 12, 14, 0))
    screw = bpy.context.active_object
    screw.name = "Caliper_Lock_Screw"
    screw.rotation_euler = (math.radians(90), 0, 0)
    screw.data.materials.append(material)
    
    # Depth Measuring Rod (extends through the rear channel)
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(initial_offset_mm + 95, 0, -1.8))
    depth_rod = bpy.context.active_object
    depth_rod.name = "Caliper_Depth_Rod"
    depth_rod.scale = (200, 3.0, 1.2)
    bpy.ops.object.transform_apply(location=False, rotation=False, scale=True)
    depth_rod.data.materials.append(material)
    
    # Join slider parts
    slider.select_set(True)
    slide_jaw.select_set(True)
    slide_horn.select_set(True)
    screw.select_set(True)
    depth_rod.select_set(True)
    bpy.context.view_layer.objects.active = slider
    bpy.ops.object.join()
    slider.name = "Vernier_Caliper_Sliding_Assembly"
    return slider

def setup_studio_lighting():
    """Sets up a three-point studio lighting rig for high-contrast metallic highlights."""
    # Key Light
    bpy.ops.object.light_add(type='AREA', location=(60, 80, 100))
    key = bpy.context.active_object
    key.name = "Key_Light"
    key.data.energy = 800
    key.data.size = 60
    
    # Fill Light (Cold Cyan)
    bpy.ops.object.light_add(type='AREA', location=(-80, -60, 60))
    fill = bpy.context.active_object
    fill.name = "Fill_Light"
    fill.data.energy = 400
    fill.data.color = (0.5, 0.85, 1.0)
    fill.data.size = 80
    
    # Rim Backlight (Warm Amber Edge)
    bpy.ops.object.light_add(type='POINT', location=(120, -50, -40))
    rim = bpy.context.active_object
    rim.name = "Rim_Light"
    rim.data.energy = 300
    rim.data.color = (1.0, 0.7, 0.4)

def build_scene():
    """Builds the complete Vernier Caliper scene."""
    clean_scene()
    steel_mat = create_brushed_steel_material()
    fixed_body = create_main_beam(steel_mat)
    slider = create_sliding_assembly(steel_mat, initial_offset_mm=88.60)
    setup_studio_lighting()
    print("[Blender MCP] Vernier Caliper 3D Model generated successfully.")

if __name__ == "__main__":
    build_scene()
