# ==============================================================================
# Blender 3D Python Script (bpy) — All 12 Chapters Photorealistic PBR Models
# Course: 4011111 Physics for Microbiology (ArUco IDs 0 to 11)
# Run in Blender Scripting tab or via CLI:
#   blender --background --python create_all_12_chapters_blender.py
# ==============================================================================
import bpy
import math

def clear_scene():
    bpy.ops.object.select_all(action='SELECT')
    bpy.ops.object.delete(use_global=False)

def make_pbr_mat(name, color, metallic=0.0, roughness=0.25,
                 transmission=0.0, ior=1.45, clearcoat=0.0, emission=None, em_strength=0.0):
    mat = bpy.data.materials.new(name=name)
    mat.use_nodes = True
    bsdf = mat.node_tree.nodes.get("Principled BSDF")
    if bsdf:
        bsdf.inputs["Base Color"].default_value = color
        bsdf.inputs["Metallic"].default_value = metallic
        bsdf.inputs["Roughness"].default_value = roughness
        for k in ("Transmission Weight", "Transmission"):
            if k in bsdf.inputs:
                bsdf.inputs[k].default_value = transmission
        if "IOR" in bsdf.inputs:
            bsdf.inputs["IOR"].default_value = ior
        for k in ("Coat Weight", "Clearcoat"):
            if k in bsdf.inputs:
                bsdf.inputs[k].default_value = clearcoat
        if emission and "Emission Color" in bsdf.inputs:
            bsdf.inputs["Emission Color"].default_value = emission
            bsdf.inputs["Emission Strength"].default_value = em_strength
    return mat

def build_all_12_textbook_models():
    clear_scene()

    # Shared Photorealistic PBR Materials Library
    mats = {
        "borosilicate": make_pbr_mat("Borosilicate_Glass", (0.94, 0.98, 1.0, 1), 0.0, 0.03, 0.96, 1.52, 1.0),
        "polypropylene": make_pbr_mat("Clear_Polypropylene", (0.88, 0.95, 1.0, 1), 0.0, 0.08, 0.90, 1.49, 1.0),
        "quartz": make_pbr_mat("Optical_Quartz_UV", (0.96, 0.99, 1.0, 1), 0.0, 0.02, 0.98, 1.458, 1.0),
        "stainless": make_pbr_mat("Stainless_316L", (0.86, 0.89, 0.93, 1), 0.95, 0.12, 0.0, 1.45, 0.6),
        "blue_anodized": make_pbr_mat("Blue_Anodized_Alu", (0.03, 0.38, 0.75, 1), 0.65, 0.20, 0.0, 1.45, 0.8),
        "gold_peltier": make_pbr_mat("Gold_Peltier_Alloy", (0.98, 0.74, 0.12, 1), 0.92, 0.16, 0.0, 1.45, 0.5),
        "copper": make_pbr_mat("Polished_Copper", (0.92, 0.42, 0.15, 1), 0.90, 0.18, 0.0, 1.45, 0.4),
        "dark_pvdf": make_pbr_mat("Dark_PVDF_Polymer", (0.09, 0.12, 0.18, 1), 0.15, 0.32),
        "bio_emerald": make_pbr_mat("Bacterial_Bio_Capsule", (0.06, 0.75, 0.48, 1), 0.0, 0.15, 0.45, 1.38, 0.9),
        "immersion_oil": make_pbr_mat("Cedarwood_Oil_1_515", (0.98, 0.82, 0.18, 1), 0.0, 0.02, 0.92, 1.515, 1.0),
        "agar_gel": make_pbr_mat("Nutrient_Agar_Gel", (0.95, 0.72, 0.15, 1), 0.0, 0.12, 0.78, 1.34, 0.8),
        "uv_glow": make_pbr_mat("UVC_254nm_Plasma", (0.68, 0.32, 0.98, 1), 0.0, 0.1, 0.5, 1.45, 0.0, (0.68, 0.32, 0.98, 1), 4.5),
    }

    chapters = [
        ("Ch01_ID0_Micropipette_TestTubes", (-15, 0, 0)),
        ("Ch02_ID1_Flagella_Brownian", (-10, 0, 0)),
        ("Ch03_ID2_Stokes_BSC_HEPA", (-5, 0, 0)),
        ("Ch04_ID3_Centrifuge_Rotor", (0, 0, 0)),
        ("Ch05_ID4_PCR_Peltier_DNA", (5, 0, 0)),
        ("Ch06_ID5_Autoclave_Vessel", (10, 0, 0)),
        ("Ch07_ID6_GramStain_ZetaWall", (-15, 6, 0)),
        ("Ch08_ID7_Gel_Electrophoresis", (-10, 6, 0)),
        ("Ch09_ID8_Brix_Refractometer", (-5, 6, 0)),
        ("Ch10_ID9_Microscope_100x_Oil", (0, 6, 0)),
        ("Ch11_ID10_UVC_254nm_Sterilizer", (5, 6, 0)),
        ("Ch12_ID11_Spectrophotometer_OD600", (10, 6, 0)),
    ]

    for idx, (col_name, offset) in enumerate(chapters):
        ox, oy, oz = offset
        # Base Fiducial Pedestal
        bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=1.8, depth=0.2, location=(ox, oy, oz))
        ped = bpy.context.active_object
        ped.name = f"{col_name}_Pedestal"
        ped.data.materials.append(mats["dark_pvdf"])

        if idx == 0:
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=0.35, depth=2.4, location=(ox - 0.6, oy, oz + 2.2))
            bpy.context.active_object.data.materials.append(mats["blue_anodized"])
            bpy.ops.mesh.primitive_cone_add(vertices=48, radius1=0.06, radius2=0.22, depth=1.5, location=(ox - 0.6, oy, oz + 0.6))
            bpy.context.active_object.data.materials.append(mats["polypropylene"])
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=0.38, depth=2.6, location=(ox + 0.6, oy, oz + 1.5))
            bpy.context.active_object.data.materials.append(mats["borosilicate"])
        elif idx == 1:
            bpy.ops.mesh.primitive_uv_sphere_add(segments=48, ring_count=24, radius=0.65, location=(ox, oy, oz + 1.5))
            obj = bpy.context.active_object
            obj.scale = (1.8, 0.8, 0.8)
            obj.data.materials.append(mats["bio_emerald"])
        elif idx == 2:
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=0.65, depth=2.8, location=(ox - 0.5, oy, oz + 1.6))
            bpy.context.active_object.data.materials.append(mats["borosilicate"])
            bpy.ops.mesh.primitive_cube_add(size=1.4, location=(ox + 0.7, oy, oz + 1.4))
            bpy.context.active_object.data.materials.append(mats["stainless"])
        elif idx == 3:
            bpy.ops.mesh.primitive_cone_add(vertices=64, radius1=1.2, radius2=0.75, depth=1.1, location=(ox, oy, oz + 1.0))
            bpy.context.active_object.data.materials.append(mats["blue_anodized"])
        elif idx == 4:
            bpy.ops.mesh.primitive_cube_add(size=1.6, location=(ox, oy, oz + 0.6))
            b = bpy.context.active_object
            b.scale = (1.2, 0.8, 0.35)
            b.data.materials.append(mats["gold_peltier"])
        elif idx == 5:
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=1.05, depth=2.4, location=(ox, oy, oz + 1.4))
            bpy.context.active_object.data.materials.append(mats["stainless"])
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=1.1, depth=0.5, location=(ox, oy, oz + 0.4))
            bpy.context.active_object.data.materials.append(mats["copper"])
        elif idx == 6:
            bpy.ops.mesh.primitive_cube_add(size=1.8, location=(ox, oy, oz + 0.8))
            w = bpy.context.active_object
            w.scale = (1.3, 0.9, 0.3)
            w.data.materials.append(mats["bio_emerald"])
        elif idx == 7:
            bpy.ops.mesh.primitive_cube_add(size=1.8, location=(ox, oy, oz + 0.8))
            t = bpy.context.active_object
            t.scale = (1.4, 0.9, 0.35)
            t.data.materials.append(mats["borosilicate"])
        elif idx == 8:
            bpy.ops.mesh.primitive_cone_add(vertices=3, radius1=1.1, radius2=1.1, depth=1.2, location=(ox, oy, oz + 0.9))
            bpy.context.active_object.data.materials.append(mats["borosilicate"])
        elif idx == 9:
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=0.48, depth=1.8, location=(ox, oy, oz + 2.0))
            bpy.context.active_object.data.materials.append(mats["stainless"])
            bpy.ops.mesh.primitive_uv_sphere_add(segments=36, ring_count=18, radius=0.35, location=(ox, oy, oz + 0.9))
            bpy.context.active_object.data.materials.append(mats["immersion_oil"])
        elif idx == 10:
            bpy.ops.mesh.primitive_cylinder_add(vertices=48, radius=0.16, depth=2.4, location=(ox, oy, oz + 2.4))
            u = bpy.context.active_object
            u.rotation_euler[1] = math.pi / 2
            u.data.materials.append(mats["uv_glow"])
            bpy.ops.mesh.primitive_cylinder_add(vertices=64, radius=0.95, depth=0.25, location=(ox, oy, oz + 0.5))
            bpy.context.active_object.data.materials.append(mats["agar_gel"])
        elif idx == 11:
            bpy.ops.mesh.primitive_cube_add(size=0.75, location=(ox, oy, oz + 1.2))
            c = bpy.context.active_object
            c.scale = (0.7, 0.7, 1.8)
            c.data.materials.append(mats["quartz"])

    print("Successfully built all 12 Photorealistic PBR Chapter Models in Blender!")

if __name__ == "__main__":
    build_all_12_textbook_models()
