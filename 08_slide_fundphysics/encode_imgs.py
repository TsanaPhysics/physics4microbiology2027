#!/usr/bin/env python3
import base64, sys

files = [
    ("/Users/chewathassana/.gemini/antigravity-ide/brain/1be88207-8512-4763-9edf-1f0acdaaefa2/vector_addition_diagram_1784614030077.png", "img_vector_addition.png"),
    ("/Users/chewathassana/.gemini/antigravity-ide/brain/1be88207-8512-4763-9edf-1f0acdaaefa2/si_units_hexagon_1784614041653.png", "img_si_units.png"),
    ("/Users/chewathassana/.gemini/antigravity-ide/brain/1be88207-8512-4763-9edf-1f0acdaaefa2/right_hand_rule_1784614051542.png", "img_right_hand_rule.png"),
]

for src, dst in files:
    with open(src, "rb") as f:
        data = f.read()
    import shutil
    shutil.copy(src, "/Applications/XAMPP/xamppfiles/htdocs/04_Education_Exam/slide_fundphysics/" + dst)
    print(f"Copied {dst}")
