// ============================================================================
// 4011111 Physics for Microbiology — 3D CAD Reference Model (OpenSCAD MCP)
// High-Speed Microcentrifuge 6-Place Fixed-Angle Rotor (30 deg)
// ============================================================================
$fn = 64;

union() {
  // 1. Rotor Body (Anodized Blue/Cyan Aluminum)
  color([0.05, 0.52, 0.85])
  difference() {
    cylinder(h=28, r1=48, r2=36, center=true);
    cylinder(h=32, r=8, center=true);
    for (i = [0:5]) {
      rotate([0, 0, i*60])
      translate([28, 0, 2])
      rotate([0, -28, 0])
      cylinder(h=34, r=6.2, center=true);
    }
  }
  // 2. 6 Balanced Microcentrifuge Tubes (1.5 mL Eppendorf)
  for (i = [0:5]) {
    color(i % 2 == 0 ? [0.06, 0.73, 0.51] : [0.96, 0.62, 0.04])
    rotate([0, 0, i*60])
    translate([28, 0, 5])
    rotate([0, -28, 0]) {
      cylinder(h=28, r1=2.2, r2=5.8, center=true);
      translate([0, 0, 15]) cylinder(h=2.5, r=7.2, center=true);
    }
  }
  // 3. Central Hex Locking Nut (Polished Brass)
  color([0.95, 0.75, 0.15])
  translate([0, 0, 15])
  cylinder(h=6, r=11, $fn=6, center=true);
}
