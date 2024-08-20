<?php

Route::get('test', function () {
    return 'ok';
});

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');

    // Provinsi
    Route::delete('provinsis/destroy', 'ProvinsiController@massDestroy')->name('provinsis.massDestroy');
    Route::resource('provinsis', 'ProvinsiController');

    // Kabupaten
    Route::delete('kabupatens/destroy', 'KabupatenController@massDestroy')->name('kabupatens.massDestroy');
    Route::resource('kabupatens', 'KabupatenController');

    // Penduduk
    Route::delete('penduduks/destroy', 'PendudukController@massDestroy')->name('penduduks.massDestroy');
    Route::post('penduduks/media', 'PendudukController@storeMedia')->name('penduduks.storeMedia');
    Route::post('penduduks/ckmedia', 'PendudukController@storeCKEditorImages')->name('penduduks.storeCKEditorImages');
    Route::resource('penduduks', 'PendudukController');

    // Perusahaan
    // Route::delete('perusahaans/destroy', 'PerusahaanController@massDestroy')->name('perusahaans.massDestroy');
    // Route::resource('perusahaans', 'PerusahaanController');

    // // Produk
    // Route::delete('produks/destroy', 'ProdukController@massDestroy')->name('produks.massDestroy');
    // Route::post('produks/media', 'ProdukController@storeMedia')->name('produks.storeMedia');
    // Route::post('produks/ckmedia', 'ProdukController@storeCKEditorImages')->name('produks.storeCKEditorImages');
    // Route::resource('produks', 'ProdukController');

    // // Transaksi
    // Route::delete('transaksis/destroy', 'TransaksiController@massDestroy')->name('transaksis.massDestroy');
    // Route::resource('transaksis', 'TransaksiController');

    // Ms Category
    Route::delete('ms-categories/destroy', 'MsCategoryController@massDestroy')->name('ms-categories.massDestroy');
    Route::resource('ms-categories', 'MsCategoryController');

    // Transaction Detail
    Route::delete('transaction-details/destroy', 'TransactionDetailController@massDestroy')->name('transaction-details.massDestroy');
    Route::resource('transaction-details', 'TransactionDetailController');

    // Transaction Header
    Route::delete('transaction-headers/destroy', 'TransactionHeaderController@massDestroy')->name('transaction-headers.massDestroy');
    Route::resource('transaction-headers', 'TransactionHeaderController');


    // Cpl
    Route::delete('cpls/destroy', 'CplController@massDestroy')->name('cpls.massDestroy');
    Route::resource('cpls', 'CplController');

    // Sub Cpmk
    Route::delete('sub-cpmks/destroy', 'SubCpmkController@massDestroy')->name('sub-cpmks.massDestroy');
    Route::resource('sub-cpmks', 'SubCpmkController');

    // Mata Kuliah
    Route::delete('mata-kuliahs/destroy', 'MataKuliahController@massDestroy')->name('mata-kuliahs.massDestroy');
    Route::resource('mata-kuliahs', 'MataKuliahController');

    // Kelas
    Route::delete('kelas/destroy', 'KelasController@massDestroy')->name('kelas.massDestroy');
    Route::resource('kelas', 'KelasController');

    // Nilai
    Route::delete('nilais/destroy', 'NilaiController@massDestroy')->name('nilais.massDestroy');
    Route::resource('nilais', 'NilaiController');

    // Cpmk
    Route::delete('cpmks/destroy', 'CpmkController@massDestroy')->name('cpmks.massDestroy');
    Route::resource('cpmks', 'CpmkController');

    // Klasifikasi
    Route::delete('klasifikasis/destroy', 'KlasifikasiController@massDestroy')->name('klasifikasis.massDestroy');
    Route::resource('klasifikasis', 'KlasifikasiController');

    // Bab
    Route::delete('babs/destroy', 'BabController@massDestroy')->name('babs.massDestroy');
    Route::resource('babs', 'BabController');

    // Sub Bab
    Route::delete('sub-babs/destroy', 'SubBabController@massDestroy')->name('sub-babs.massDestroy');
    Route::resource('sub-babs', 'SubBabController');

    // Materi
    Route::delete('materis/destroy', 'MateriController@massDestroy')->name('materis.massDestroy');
    Route::post('materis/parse-csv-import', 'MateriController@parseCsvImport')->name('materis.parseCsvImport');
    Route::post('materis/process-csv-import', 'MateriController@processCsvImport')->name('materis.processCsvImport');
    Route::resource('materis', 'MateriController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
