#!/usr/bin/env python3
"""
verify_all_system.py
Complete automated audit verifying PHP syntax, HTTP 200 responses,
3D simulations, and asset integrity across the entire project.
"""

import os
import glob
import subprocess
import urllib.request
import urllib.error

ROOT_DIR = "/Applications/XAMPP/xamppfiles/htdocs/physics4microbioloy2027"
PHP_BIN = "/Applications/XAMPP/xamppfiles/bin/php"
BASE_URL = "http://localhost/physics4microbioloy2027"

def check_php_syntax():
    print("=== 1. CHECKING PHP SYNTAX ===")
    php_files = glob.glob(f"{ROOT_DIR}/**/*.php", recursive=True)
    # Ignore backup directories
    php_files = [f for f in php_files if "_backup" not in f and "vendor" not in f]
    errors = []
    for f in php_files:
        res = subprocess.run([PHP_BIN, "-l", f], capture_output=True, text=True)
        if res.returncode != 0:
            errors.append((f, res.stderr.strip() or res.stdout.strip()))
    print(f"Total PHP files checked: {len(php_files)}")
    if errors:
        print(f"FAILED: {len(errors)} errors found:")
        for path, err in errors:
            print(f"  - {path}: {err}")
    else:
        print("PASSED: 100% of PHP files have ZERO syntax errors!")
    return len(errors) == 0

def check_http_endpoints():
    print("\n=== 2. CHECKING HTTP 200 STATUS CODES ===")
    endpoints = [
        # Main portals
        "/index.php",
        "/03_physics4microbio2026/index.php",
        "/virtual_lab/index.html",
        "/admin/index.php",
    ]
    # 12 Chapters
    for i in range(1, 13):
        endpoints.append(f"/03_physics4microbio2026/chapters/ch{i:02d}_th.php")
    
    # 13 Labs
    lab_slugs = [
        "lab01_measurement", "lab02_brownian_motion", "lab03_viscosity",
        "lab04_centrifuge", "lab05_heat_incubator", "lab06_autoclave",
        "lab07_gram_electrostatics", "lab08_electrophoresis", "lab09_refraction",
        "lab10_microscope", "lab11_radioactivity_uv", "lab12_od600", "lab13_mini_project"
    ]
    for slug in lab_slugs:
        endpoints.append(f"/03_physics4microbio2026/labs/{slug}.php")

    # 3D Simulators in 03_physics4microbio2026/simulations/
    sim_files = [
        "sim_micropipette_3d.html", "sim02_brownian_motion_3d.html", "sim03_viscometer_3d.html",
        "sim04_centrifuge_3d.html", "sim05_incubator_3d.html", "sim06_autoclave_3d.html",
        "sim07_gram_stain_3d.html", "sim10_electrophoresis_3d.html", "sim09_refraction_3d.html",
        "sim11_optics_3d.html", "sim12_radioactivity_3d.html", "sim12_od600_3d.html"
    ]
    for sf in sim_files:
        endpoints.append(f"/03_physics4microbio2026/simulations/{sf}")
        endpoints.append(f"/virtual_lab/{sf}")

    # Preserved Enrichment
    enrichment = [
        "momentum_th.php", "lab_momentum.php",
        "osmosis_th.php", "lab_osmosis.php",
        "atp_synthase_th.php", "lab_atp_synthase.php",
        "flagella_th.php", "lab_flagella.php"
    ]
    for ef in enrichment:
        endpoints.append(f"/03_physics4microbio2026/enrichment/{ef}")

    failed = []
    passed = 0
    for ep in endpoints:
        url = BASE_URL + ep
        try:
            req = urllib.request.Request(url, headers={'User-Agent': 'SystemAudit/1.0'})
            with urllib.request.urlopen(req, timeout=5) as resp:
                if resp.status == 200:
                    passed += 1
                else:
                    failed.append((url, resp.status))
        except Exception as e:
            failed.append((url, str(e)))

    print(f"Total endpoints tested: {len(endpoints)}")
    print(f"HTTP 200 Success: {passed}")
    if failed:
        print(f"FAILED ({len(failed)}):")
        for u, err in failed:
            print(f"  - {u} => {err}")
    else:
        print("PASSED: 100% of tested endpoints responded with HTTP 200 OK!")
    return len(failed) == 0

def check_assets():
    print("\n=== 3. CHECKING SVG & 3D ASSETS INTEGRITY ===")
    tikz_svgs = glob.glob(f"{ROOT_DIR}/03_physics4microbio2026/images/maintex/tikz/*.svg")
    print(f"Compiled TikZ SVGs: {len(tikz_svgs)} files (Expected 12)")
    
    sec3d_imgs = glob.glob(f"{ROOT_DIR}/03_physics4microbio2026/images/maintex/sec_3d/*.jpg")
    print(f"Deepskin 3D Illustrations: {len(sec3d_imgs)} files (Expected >= 36)")

    aruco_pngs = glob.glob(f"{ROOT_DIR}/03_physics4microbio2026/images/maintex/aruco/*.png")
    print(f"ArUco Markers 0-11: {len(aruco_pngs)} files (Expected 12)")

    status = (len(tikz_svgs) == 12 and len(sec3d_imgs) >= 36 and len(aruco_pngs) == 12)
    if status:
        print("PASSED: All visual assets intact and complete!")
    else:
        print("WARNING: Some visual assets may be missing.")
    return status

if __name__ == "__main__":
    s1 = check_php_syntax()
    s2 = check_http_endpoints()
    s3 = check_assets()
    if s1 and s2 and s3:
        print("\n🎉 ALL AUDIT CHECKS PASSED PERFECTLY (100% HEALTHY)!")
    else:
        print("\n⚠️ SOME CHECKS NEED ATTENTION.")
