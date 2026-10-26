# ==============================================================================
# Blender 3D Python Script (bpy) — Photorealistic P1000 Micropipette & Test Tube
# Generated via blender-3d MCP Architecture for 4011111 Physics for Microbiology
# Run in Blender Scripting tab or via CLI:
#   blender --background --python create_p1000_micropipette_blender.py
# ==============================================================================
import bpy
import math

def clear_scene():
    bpy.ops.object.select_all(action='SELECT')
    bpy.ops.object.delete(use_global=False)

def make_pbr_material(name, base_color, metallic=0.0, roughness=0.3,
                      transmission=0.0, ior=1.45, clearcoat=0.0, alpha=1.0):
    mat = bpy.data.materials.new(name=name)
    mat.use_nodes = True
    bsdf = mat.node_tree.nodes.get("Principled BSDF")
    if bsdf:
        bsdf.inputs["Base Color"].default_value = base_color
        bsdf.inputs["Metallic"].default_value = metallic
        bsdf.inputs["Roughness"].default_value = roughness
        if "Transmission Weight" in bsdf.inputs:
            bsdf.inputs["Transmission Weight"].default_value = transmission
        elif "Transmission" in bsdf.inputs:
            bsdf.inputs["Transmission"].default_value = transmission
        if "IOR" in bsdf.inputs:
            bsdf.inputs["IOR"].default_value = ior
        if "Coat Weight" in bsdf.inputs:
            bsdf.inputs["Coat Weight"].default_value = clearcoat
        elif "Clearcoat" in bsdf.inputs:
            bsdf.inputs["Clearcoat"].default_value = clearcoat
        if "Alpha" in bsdf.inputs:
            bsdf.inputs["Alpha"].default_value = alpha
    return mat

def build_p1000_scene():
    clear_scene()

    # 1. Define Physically-Based (PBR) Materials
    mat_blue_pp = make_pbr_material(
        "Gilson_Blue_Polypropylene", (0.02, 0.28, 0.68, 1.0),
        metallic=0.05, roughness=0.28, clearcoat=0.4
    )
    mat_dark_pvdf = make_pbr_material(
        "PVDF_Nose_Cone", (0.08, 0.11, 0.16, 1.0),
        metallic=0.15, roughness=0.32
    )
    mat_chrome = make_pbr_material(
        "Stainless_Steel_316L", (0.85, 0.88, 0.92, 1.0),
        metallic=0.95, roughness=0.12, clearcoat=0.6
    )
    mat_amber_cap = make_pbr_material(
        "P1000_Amber_Thumb_Cap", (0.95, 0.62, 0.05, 1.0),
        metallic=0.25, roughness=0.22, clearcoat=0.8
    )
    mat_clear_tip = make_pbr_material(
        "Clear_Polypropylene_Tip", (0.88, 0.96, 1.0, 1.0),
        metallic=0.0, roughness=0.08, transmission=0.92, ior=1.49, clearcoat=1.0
    )
    mat_borosilicate = make_pbr_material(
        "Borosilicate_Glass_3_3", (0.94, 0.98, 1.0, 1.0),
        metallic=0.0, roughness=0.03, transmission=0.97, ior=1.52, clearcoat=1.0
    )
    mat_reagent_blue = make_pbr_material(
        "Methylene_Blue_Reagent", (0.0, 0.65, 0.98, 1.0),
        metallic=0.0, roughness=0.05, transmission=0.82, ior=1.333
    )
    mat_culture_broth = make_pbr_material(
        "LB_Bacterial_Culture_Broth", (0.06, 0.78, 0.52, 1.0),
        metallic=0.0, roughness=0.12, transmission=0.75, ior=1.335
    )

    # 2. Disposable 1000 uL Polypropylene Tip (Hollow Cone)
    bpy.ops.mesh.primitive_cone_add(
        vertices=64, radius1=0.09, radius2=0.38, depth=4.2, location=(0, 0, 2.1)
    )
    tip = bpy.context.active_object
    tip.name = "P1000_Disposable_Tip"
    tip.data.materials.append(mat_clear_tip)
    bpy.ops.object.shade_smooth()

    # 3. Aspirated Liquid Column inside Tip (1000 uL)
    bpy.ops.mesh.primitive_cone_add(
        vertices=48, radius1=0.075, radius2=0.31, depth=3.1, location=(0, 0, 1.8)
    )
    tip_liq = bpy.context.active_object
    tip_liq.name = "P1000_Aspirated_Liquid"
    tip_liq.data.materials.append(mat_reagent_blue)
    bpy.ops.object.shade_smooth()

    # 4. Lower PVDF Shaft & Tip Ejector Collar
    bpy.ops.mesh.primitive_cone_add(
        vertices=64, radius1=0.36, radius2=0.64, depth=3.4, location=(0, 0, 5.7)
    )
    shaft = bpy.context.active_object
    shaft.name = "P1000_Lower_Shaft"
    shaft.data.materials.append(mat_dark_pvdf)
    bpy.ops.object.shade_smooth()

    # 5. Ergonomic Royal-Blue Handle Body
    bpy.ops.mesh.primitive_cylinder_add(
        vertices=64, radius=0.78, depth=5.4, location=(0, 0, 10.1)
    )
    handle = bpy.context.active_object
    handle.name = "P1000_Ergonomic_Handle"
    handle.data.materials.append(mat_blue_pp)
    bpy.ops.object.shade_smooth()

    # 6. Ergonomic Finger Rest Hook
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(0.95, 0, 12.1))
    hook = bpy.context.active_object
    hook.name = "P1000_Finger_Hook"
    hook.scale = (0.75, 0.35, 0.18)
    hook.rotation_euler[1] = math.radians(18)
    hook.data.materials.append(mat_dark_pvdf)

    # 7. Stainless Steel Tip-Ejector Side Bar
    bpy.ops.mesh.primitive_cube_add(size=1.0, location=(-0.78, 0, 8.8))
    ejector = bpy.context.active_object
    ejector.name = "P1000_Tip_Ejector_Arm"
    ejector.scale = (0.14, 0.24, 3.6)
    ejector.data.materials.append(mat_chrome)

    # 8. Knurled Micrometer Dial & Plunger Rod + Amber Thumb Cap
    bpy.ops.mesh.primitive_cylinder_add(
        vertices=64, radius=0.68, depth=1.1, location=(0, 0, 13.4)
    )
    dial = bpy.context.active_object
    dial.name = "P1000_Micrometer_Dial"
    dial.data.materials.append(mat_dark_pvdf)

    bpy.ops.mesh.primitive_cylinder_add(
        vertices=48, radius=0.28, depth=2.2, location=(0, 0, 15.0)
    )
    plunger = bpy.context.active_object
    plunger.name = "P1000_Plunger_Rod"
    plunger.data.materials.append(mat_chrome)
    bpy.ops.object.shade_smooth()

    bpy.ops.mesh.primitive_cylinder_add(
        vertices=64, radius=0.72, depth=0.45, location=(0, 0, 16.2)
    )
    cap = bpy.context.active_object
    cap.name = "P1000_Thumb_Button"
    cap.data.materials.append(mat_amber_cap)
    bpy.ops.object.shade_smooth()

    # 9. Borosilicate Glass Test Tube & Bacterial Culture Broth (Next to Pipette)
    bpy.ops.mesh.primitive_cylinder_add(
        vertices=64, radius=0.72, depth=8.8, location=(2.8, 0, 4.6)
    )
    tube = bpy.context.active_object
    tube.name = "Borosilicate_Test_Tube"
    tube.data.materials.append(mat_borosilicate)
    bpy.ops.object.shade_smooth()

    bpy.ops.mesh.primitive_cylinder_add(
        vertices=64, radius=0.62, depth=5.2, location=(2.8, 0, 2.9)
    )
    broth = bpy.context.active_object
    broth.name = "Bacterial_Culture_Broth"
    broth.data.materials.append(mat_culture_broth)
    bpy.ops.object.shade_smooth()

    # 10. Studio 3-Point Area Lighting & Camera
    bpy.ops.object.light_add(type='AREA', location=(6.0, -6.0, 12.0))
    key_light = bpy.context.active_object
    key_light.data.energy = 850
    key_light.data.size = 5.0

    bpy.ops.object.light_add(type='AREA', location=(-6.0, 4.0, 9.0))
    rim_light = bpy.context.active_object
    rim_light.data.energy = 450
    rim_light.data.color = (0.4, 0.85, 1.0)

    bpy.ops.object.camera_add(location=(0.9, -18.5, 8.5), rotation=(math.radians(88), 0, 0))
    bpy.context.scene.camera = bpy.context.active_object

    print("Successfully built Photorealistic P1000 Micropipette & Test Tube in Blender!")

if __name__ == "__main__":
    build_p1000_scene()
