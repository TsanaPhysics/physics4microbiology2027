import os
import re

sim_map = {
    1: ("sim01_unit_converter.php", "Unit Converter"),
    2: ("sim02_vector_addition.php", "Vector Addition"),
    3: ("sim03_brownian_motion.php", "Brownian Dynamics"),
    4: ("sim04_centrifuge.php", "Centrifuge Lab"),
    5: ("sim05_collision.php", "Bio-Collisions"),
    6: ("sim06_osmosis.php", "Osmosis Sim"),
    7: ("sim07_atp_synthase.php", "Molecular Motor"),
    8: ("sim08_lever.php", "Biomechanics"),
    9: ("sim09_pcr_thermal.php", "Thermal PCR"),
    10: ("sim10_electrophoresis.php", "Electrophoresis"),
    11: ("sim11_microscope.php", "Smart Microscopy"),
    12: ("sim12_decay.php", "Isotope Decay")
}

base_dir = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
tex_base = os.path.join(base_dir, '../fundamentalphysics2026/fphymicro/latex/chapters')

for ch, (url, name) in sim_map.items():
    ch_str = str(ch).zfill(2)
    tex_path = os.path.join(tex_base, f'chapter{ch_str}.tex')
    
    if os.path.exists(tex_path):
        with open(tex_path, 'r', encoding='utf-8') as f:
            content = f.read()
            
        if '\\xrlink' in content: continue
        
        # Inject right after \chapter{...}
        # Use raw string for replacement and escape backslashes
        repl = r'\1' + f'\n\\\\xrlink{{{url}}}{{{name}}}'
        new_content = re.sub(r'(\\chapter\{.*?\})', repl, content)
        
        with open(tex_path, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Injected XR link into: {tex_path}")

