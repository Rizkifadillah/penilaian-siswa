
<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Beranda
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});


// Categories
Breadcrumbs::for('staff', function ( $trail) {
    $trail->push('Staff', route('staff.index'));
});


// staff > add
Breadcrumbs::for('add_staff', function ( $trail) {
    $trail->parent('staff');
    $trail->push('Tambah Staff', route('staff.create'));
});


// staff > add
Breadcrumbs::for('edit_staff', function ( $trail,$staff) {
    $trail->parent('staff');
    $trail->push('Edit Staff', route('staff.edit',['staff' => $staff]));
});



// tags > edit > [title]
Breadcrumbs::for('edit_staff_name', function ( $trail, $staff) {
    $trail->parent('edit_staff', $staff);
    $trail->push( ucwords($staff->name), route('staff.edit',['staff' => $staff]));
});

// Categories
Breadcrumbs::for('mapel', function ( $trail) {
    $trail->push('Mapel', route('mapel.index'));
});

// mapel > add
Breadcrumbs::for('edit_mapel', function ( $trail,$mapel) {
    $trail->parent('mapel');
    $trail->push('Edit Mapel', route('mapel.edit',['mapel' => $mapel]));
});

// tags > edit > [title]
Breadcrumbs::for('edit_mapel_name', function ( $trail, $mapel) {
    $trail->parent('edit_mapel', $mapel);
    $trail->push( ucwords($mapel->nama), route('mapel.edit',['mapel' => $mapel]));
});

// Categories
Breadcrumbs::for('guru', function ( $trail) {
    $trail->push('Guru', route('guru.index'));
});

// staff > add
Breadcrumbs::for('add_guru', function ( $trail) {
    $trail->parent('guru');
    $trail->push('Tambah guru', route('guru.create'));
});
