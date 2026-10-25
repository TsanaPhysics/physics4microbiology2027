// ============================================================================
// P1000 Adjustable-Volume Micropipette & 15mL Test Tube CAD Assembly
// Course: 4011111 Physics for Microbiology
// ============================================================================
$fn = 64;

module p1000_micropipette() {
    // 1. Lower Tip Cone (Disposable Polypropylene 1000 uL Blue/Clear Tip)
    color([0.75, 0.92, 1.0, 0.65])
    translate([0, 0, 0])
    difference() {
        union() {
            cylinder(h = 38, r1 = 0.9, r2 = 3.6);
            translate([0, 0, 38]) cylinder(h = 12, r1 = 3.6, r2 = 4.2);
            for (a = [0:45:315]) {
                rotate([0, 0, a])
                translate([3.9, -0.35, 40])
                cube([0.6, 0.7, 9]);
            }
        }
        translate([0, 0, -0.5]) cylinder(h = 51, r1 = 0.55, r2 = 3.5);
    }

    // 2. Aspirated Liquid Column inside Tip (1000 uL Blue Reagent with Meniscus)
    color([0.0, 0.68, 0.95, 0.85])
    difference() {
        translate([0, 0, 3]) cylinder(h = 31, r1 = 0.65, r2 = 3.0);
        translate([0, 0, 34.5]) sphere(r = 3.2);
    }

    // 3. Lower Nose Cone & Tip Ejector Sleeve (Dark Slate PVDF)
    color([0.18, 0.22, 0.28])
    translate([0, 0, 48]) {
        cylinder(h = 32, r1 = 3.9, r2 = 6.2);
        translate([0, 0, 32]) cylinder(h = 8, r1 = 6.2, r2 = 7.4);
    }

    // 4. Tip Ejector Side Rod & Collar (Brushed Stainless Steel)
    color([0.82, 0.85, 0.88]) {
        translate([-7.2, -1.8, 52]) cube([2.2, 3.6, 68]);
        translate([0, 0, 50])
        difference() {
            cylinder(h = 5, r = 5.4);
            translate([0, 0, -1]) cylinder(h = 7, r = 4.1);
        }
        translate([-8.2, -3.2, 120]) cube([5.5, 6.4, 8]);
    }

    // 5. Ergonomic Contoured Handle Grip (Gilson/Eppendorf Royal Blue)
    color([0.05, 0.42, 0.78])
    translate([0, 0, 86]) {
        cylinder(h = 52, r1 = 7.6, r2 = 8.4);
        translate([6.0, -3.5, 42])
        hull() {
            cube([2.5, 7.0, 6]);
            translate([9.5, 1.0, -3.5]) cylinder(h = 3.5, r = 2.5);
        }
        translate([0, 0, 52]) cylinder(h = 8, r1 = 8.4, r2 = 7.2);
    }

    // 6. Digital 4-Digit Volume Window Frame (1-0-0-0 uL)
    color([0.10, 0.13, 0.18])
    translate([6.8, -3.6, 102])
    cube([2.4, 7.2, 22]);
    color([0.95, 0.98, 1.0])
    translate([8.5, -2.6, 104])
    cube([0.9, 5.2, 18]);

    // 7. Knurled Micrometer Volume Adjustment Dial (Black Tactile Grip)
    color([0.14, 0.16, 0.20])
    translate([0, 0, 146]) {
        cylinder(h = 11, r = 6.8);
        for (a = [0:15:345]) {
            rotate([0, 0, a])
            translate([6.5, -0.4, 0.5])
            cube([0.7, 0.8, 10]);
        }
    }

    // 8. Chrome Plunger Rod & Two-Stop Thumb Button (Amber/Gold P1000 Cap)
    color([0.88, 0.91, 0.95])
    translate([0, 0, 157])
    cylinder(h = 22, r = 3.0);

    color([0.96, 0.68, 0.12])
    translate([0, 0, 179]) {
        cylinder(h = 5, r1 = 6.8, r2 = 7.4);
        translate([0, 0, 5]) cylinder(h = 2.5, r1 = 7.4, r2 = 5.8);
    }
}

module test_tube_with_rack() {
    translate([28, 0, 0]) {
        color([0.85, 0.95, 1.0, 0.45])
        difference() {
            union() {
                translate([0, 0, 7]) sphere(r = 7.0);
                translate([0, 0, 7]) cylinder(h = 85, r = 7.0);
                translate([0, 0, 92]) cylinder(h = 3, r = 7.8);
            }
            translate([0, 0, 7]) sphere(r = 6.0);
            translate([0, 0, 7]) cylinder(h = 90, r = 6.0);
        }
        color([0.06, 0.78, 0.55, 0.80])
        union() {
            translate([0, 0, 7]) sphere(r = 5.8);
            translate([0, 0, 7]) cylinder(h = 48, r = 5.8);
        }
    }
}

p1000_micropipette();
test_tube_with_rack();
