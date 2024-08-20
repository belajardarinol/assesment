<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.home') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('ms_category_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.ms-categories.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/ms-categories') || request()->is('admin/ms-categories/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.msCategory.title') }}
                </a>
            </li>
        @endcan
        @can('transaction_header_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.transaction-headers.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/transaction-headers') || request()->is('admin/transaction-headers/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.transactionHeader.title') }}
                </a>
            </li>
        @endcan
        @can('transaction_detail_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.transaction-details.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/transaction-details') || request()->is('admin/transaction-details/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.transactionDetail.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }} {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/audit-logs*') ? 'c-show' : '' }} {{ request()->is('admin/teams*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.audit-logs.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.teams.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('klasifikasi_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.klasifikasis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/klasifikasis') || request()->is('admin/klasifikasis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-location-arrow c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.klasifikasi.title') }}
                </a>
            </li>
        @endcan
        @can('bab_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.babs.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/babs') || request()->is('admin/babs/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.bab.title') }}
                </a>
            </li>
        @endcan
        @can('sub_bab_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.sub-babs.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/sub-babs') || request()->is('admin/sub-babs/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subBab.title') }}
                </a>
            </li>
        @endcan
        @can('materi_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.materis.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/materis') || request()->is('admin/materis/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-chalkboard-teacher c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.materi.title') }}
                </a>
            </li>
        @endcan
        {{-- @can('cpl_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.cpls.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/cpls') || request()->is('admin/cpls/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cpl.title') }}
                </a>
            </li>
        @endcan
        @can('sub_cpmk_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.sub-cpmks.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/sub-cpmks') || request()->is('admin/sub-cpmks/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subCpmk.title') }}
                </a>
            </li>
        @endcan --}}
        {{-- @can('mata_kuliah_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.mata-kuliahs.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/mata-kuliahs') || request()->is('admin/mata-kuliahs/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.mataKuliah.title') }}
                </a>
            </li>
        @endcan
        @can('kela_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.kelas.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/kelas') || request()->is('admin/kelas/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.kela.title') }}
                </a>
            </li>
        @endcan --}}
        @can('nilai_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.nilais.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/nilais') || request()->is('admin/nilais/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-rocket c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.nilai.title') }}
                </a>
            </li>
        @endcan
        {{-- @can('cpmk_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.cpmks.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/cpmks') || request()->is('admin/cpmks/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cpmk.title') }}
                </a>
            </li>
        @endcan --}}
        @if (
            \Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') &&
                \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
            <li class="c-sidebar-nav-item">
                <a class="{{ request()->is('admin/team-members') || request()->is('admin/team-members/*') ? 'c-active' : '' }} c-sidebar-nav-link"
                    href="{{ route('admin.team-members.index') }}">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                    </i>
                    <span>{{ trans('global.team-members') }}</span>
                </a>
            </li>
        @endif
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
