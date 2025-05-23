@extends('admins.layouts.base')
@section('title')
Users | Admin
@endsection
@section('content')



<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
          
  <div class="row g-6 mb-6">
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Session</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">21,459</h4>
                <p class="text-success mb-0">(+29%)</p>
              </div>
              <small class="mb-0">Total Users</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-primary">
                <i class="icon-base bx bx-group icon-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Paid Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">4,567</h4>
                <p class="text-success mb-0">(+18%)</p>
              </div>
              <small class="mb-0">Last week analytics </small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-danger">
                <i class="icon-base bx bx-user-plus icon-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Active Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">19,860</h4>
                <p class="text-danger mb-0">(-14%)</p>
              </div>
              <small class="mb-0">Last week analytics</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-success">
                <i class="icon-base bx bx-user-check icon-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-start justify-content-between">
            <div class="content-left">
              <span class="text-heading">Pending Users</span>
              <div class="d-flex align-items-center my-1">
                <h4 class="mb-0 me-2">237</h4>
                <p class="text-success mb-0">(+42%)</p>
              </div>
              <small class="mb-0">Last week analytics</small>
            </div>
            <div class="avatar">
              <span class="avatar-initial rounded bg-label-warning">
                <i class="icon-base bx bx-user-voice icon-lg"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Search Filters</h5>
      <div class="d-flex justify-content-between align-items-center row pt-4 gap-md-0 g-6">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <div class="card-datatable">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th></th>
            <th></th>
            <th>User</th>
            <th>Role</th>
            <th>Plan</th>
            <th>Billing</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- Offcanvas to add new user -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
      <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
          <div class="mb-6 form-control-validation">
            <label class="form-label" for="add-user-fullname">Full Name</label>
            <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe">
          </div>
          <div class="mb-6 form-control-validation">
            <label class="form-label" for="add-user-email">Email</label>
            <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
          </div>
          <div class="mb-6">
            <label class="form-label" for="add-user-contact">Contact</label>
            <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
          </div>
          <div class="mb-6">
            <label class="form-label" for="add-user-company">Company</label>
            <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName">
          </div>
          <div class="mb-6">
            <label class="form-label" for="country">Country</label>
            <select id="country" class="select2 form-select">
              <option value="">Select</option>
              <option value="Australia">Australia</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Belarus">Belarus</option>
              <option value="Brazil">Brazil</option>
              <option value="Canada">Canada</option>
              <option value="China">China</option>
              <option value="France">France</option>
              <option value="Germany">Germany</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Japan">Japan</option>
              <option value="Korea">Korea, Republic of</option>
              <option value="Mexico">Mexico</option>
              <option value="Philippines">Philippines</option>
              <option value="Russia">Russian Federation</option>
              <option value="South Africa">South Africa</option>
              <option value="Thailand">Thailand</option>
              <option value="Turkey">Turkey</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom">United Kingdom</option>
              <option value="United States">United States</option>
            </select>
          </div>
          <div class="mb-6">
            <label class="form-label" for="user-role">User Role</label>
            <select id="user-role" class="form-select">
              <option value="subscriber">Subscriber</option>
              <option value="editor">Editor</option>
              <option value="maintainer">Maintainer</option>
              <option value="author">Author</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="mb-6">
            <label class="form-label" for="user-plan">Select Plan</label>
            <select id="user-plan" class="form-select">
              <option value="basic">Basic</option>
              <option value="enterprise">Enterprise</option>
              <option value="company">Company</option>
              <option value="team">Team</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary me-3 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!--/ Content -->

@push('scripts')
<script>
    // Wait for all libraries to be loaded
    window.addEventListener('load', function() {
        console.log('Window loaded, checking libraries...');
        
        // Check if required libraries are available
        if (typeof $ === 'undefined') {
            console.error('jQuery is not loaded!');
            return;
        }
        if (typeof $.fn.DataTable === 'undefined') {
            console.error('DataTables is not loaded!');
            return;
        }
        if (typeof $.fn.select2 === 'undefined') {
            console.error('Select2 is not loaded!');
            return;
        }
        if (typeof FormValidation === 'undefined') {
            console.error('FormValidation is not loaded!');
            return;
        }

        console.log('All required libraries are loaded, initializing components...');

        document.addEventListener("DOMContentLoaded", function (e) {
            console.log('DOM Content Loaded, initializing DataTable...');
            
            let t = document.querySelector(".datatables-users");
            if (!t) {
                console.error('DataTable element not found!');
                return;
            }
            console.log('DataTable element found:', t);

            let r = "app-user-view-account.html"; // Keep link for action button if needed

            // Initialize Select2 for Country filter if it exists
            let countrySelect = $("#country");
            if (countrySelect.length) {
                console.log('Initializing Select2 for country filter...');
                countrySelect.wrap('<div class="position-relative"></div>').select2({
                    placeholder: "Select Country",
                    dropdownParent: countrySelect.parent(),
                });
            }

            if (t) {
                let dataTable = new DataTable(t, {
                    data: [], // Set data to empty array
                    columns: [
                        { data: "id" },
                        {
                            data: "id",
                            orderable: !1,
                            render: DataTable.render.select(),
                        },
                        { data: "full_name" }, // Keep column definition for structure
                        { data: "role" }, // Keep column definition for structure
                        { data: "current_plan" }, // Keep column definition for structure
                        { data: "billing" }, // Keep column definition for structure
                        { data: "status" }, // Keep column definition for structure
                        { data: "action" },
                    ],
                    columnDefs: [
                        {
                            className: "control",
                            searchable: !1,
                            orderable: !1,
                            responsivePriority: 2,
                            targets: 0,
                            render: function (e, t, a, s) {
                                return "";
                            },
                        },
                        {
                            targets: 1,
                            orderable: !1,
                            searchable: !1,
                            responsivePriority: 4,
                            checkboxes: !0,
                            checkboxes: {
                                selectAllRender:
                                    '<input type="checkbox" class="form-check-input">',
                            },
                            render: function () {
                                return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                            },
                        },
                        {
                            targets: 2, // full_name column
                            responsivePriority: 3,
                            render: function (e, t, a, s) {
                                // Render placeholder
                                return '<div class="d-flex justify-content-start align-items-center user-name"><div class="d-flex flex-column"><span class="fw-medium">-</span></div></div>';
                            },
                        },
                        {
                            targets: 3, // role column
                            render: function (e, t, a, s) {
                                 // Render placeholder
                                return "<span class='text-truncate d-flex align-items-center text-heading'>-</span>";
                            },
                        },
                        {
                            targets: 4, // current_plan column
                            render: function (e, t, a, s) {
                                // Render placeholder
                                return '<span class="text-heading">-</span>';
                            },
                        },
                         {
                            targets: 5, // billing column
                            render: function (e, t, a, s) {
                                // Render placeholder
                                return '<span class="text-heading">-</span>';
                            },
                        },
                        {
                            targets: 6, // status column
                            render: function (e, t, a, s) {
                                // Render placeholder
                                 // Use a generic placeholder since we don't have the status mapping 'n' from data
                                return '<span class="badge bg-label-secondary">-</span>';
                            },
                        },
                        {
                            targets: -1,
                            title: "Actions",
                            searchable: !1,
                            orderable: !1,
                            render: (e, t, a, s) => `
                      <div class="d-flex align-items-center">
                        <a href="javascript:;" class="btn btn-icon delete-record">
                          <i class="icon-base bx bx-trash icon-md"></i>
                        </a>
                        <a href="${r}" class="btn btn-icon">
                          <i class="icon-base bx bx-show icon-md"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                          <i class="icon-base bx bx-dots-vertical-rounded icon-md"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0">
                          <a href="javascript:;" class="dropdown-item">Edit</a>
                          <a href="javascript:;" class="dropdown-item">Suspend</a>
                        </div>
                      </div>
                    `,
                        },
                    ],
                    select: { style: "multi", selector: "td:nth-child(2)" },
                    order: [[2, "desc"]],
                    layout: {
                        topStart: {
                            rowClass: "row mx-3 my-0 justify-content-between",
                            features: [
                                {
                                    pageLength: {
                                        menu: [10, 25, 50, 100],
                                        text: "_MENU_"
                                    },
                                },
                            ],
                        },
                        topEnd: {
                            features: [
                                {
                                    search: {
                                        placeholder: "Search User", // Keep original placeholder
                                        text: "_INPUT_"
                                    },
                                },
                                {
                                    buttons: [
                                        {
                                            extend: "collection",
                                            className:
                                                "btn btn-label-secondary dropdown-toggle",
                                            text: '<span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-export icon-sm"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                                            buttons: [
                                                {
                                                    extend: "print",
                                                    text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-printer me-2"></i>Print</span>',
                                                    className: "dropdown-item",
                                                    exportOptions: {
                                                        columns: [3, 4, 5, 6, 7],
                                                         // Remove format function that relies on data
                                                    },
                                                     // Remove customize function that relies on config object
                                                },
                                                {
                                                    extend: "csv",
                                                    text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-file me-2"></i>Csv</span>',
                                                    className: "dropdown-item",
                                                    exportOptions: {
                                                        columns: [3, 4, 5, 6, 7],
                                                         // Remove format function that relies on data
                                                    },
                                                },
                                                {
                                                    extend: "excel",
                                                    text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-export me-2"></i>Excel</span>',
                                                    className: "dropdown-item",
                                                    exportOptions: {
                                                        columns: [3, 4, 5, 6, 7],
                                                         // Remove format function that relies on data
                                                    },
                                                },
                                                {
                                                    extend: "pdf",
                                                    text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-pdf me-2"></i>Pdf</span>',
                                                    className: "dropdown-item",
                                                    exportOptions: {
                                                        columns: [3, 4, 5, 6, 7],
                                                         // Remove format function that relies on data
                                                    },
                                                },
                                                {
                                                    extend: "copy",
                                                    text: '<i class="icon-base bx bx-copy me-1"></i>Copy',
                                                    className: "dropdown-item",
                                                    exportOptions: {
                                                        columns: [3, 4, 5, 6, 7],
                                                         // Remove format function that relies on data
                                                    },
                                                },
                                            ],
                                        },
                                        {
                                            text: '<i class="icon-base bx bx-plus icon-sm me-0 me-sm-2"></i><span class="d-none d-sm-inline-block">Add New User</span>',
                                            className: "add-new btn btn-primary",
                                            attr: {
                                                "data-bs-toggle": "offcanvas",
                                                "data-bs-target": "#offcanvasAddUser",
                                            },
                                        },
                                    ],
                                },
                            ],
                        },
                        bottomStart: {
                            rowClass: "row mx-3 justify-content-between",
                            features: ["info"],
                        },
                        bottomEnd: { paging: { firstLast: !1 } },
                    },
                    language: {
                        sLengthMenu: "_MENU_",
                        search: "",
                        searchPlaceholder: "Search User", // Keep original placeholder
                        paginate: {
                            next: '<i class="icon-base bx bx-chevron-right icon-18px"></i>',
                            previous:
                                '<i class="icon-base bx bx-chevron-left icon-18px"></i>',
                        },
                    },
                    responsive: {
                        details: {
                            display: DataTable.Responsive.display.modal({
                                header: function (e) {
                                    return "Details"; // Simplified header
                                },
                            }),
                            type: "column",
                            renderer: function (e, t, a) {
                                var s,
                                    n,
                                    o,
                                    a = a
                                        .map(function (e) {
                                            return "" !== e.title
                                                ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                        <td>${e.title}:</td>
                        <td>${e.data}</td>
                      </tr>`
                                                : "";
                                        })
                                        .join("");
                                return (
                                    !!a &&
                                    ((s = document.createElement("div")).classList.add(
                                        "table-responsive"
                                    ),
                                    (n = document.createElement("table")),
                                    s.appendChild(n),
                                    n.classList.add("table"),
                                    ((o = document.createElement("tbody")).innerHTML =
                                        a),
                                    n.appendChild(o),
                                    s)
                                );
                            },
                        },
                    },
                    initComplete: function () {
                        console.log('DataTable initialization complete, setting up filters...');
                        let r = this.api();

                        // Function to add filter dropdowns and initialize Select2
                        const addFilterDropdown = (columnIndex, containerClass, filterId, placeholder) => {
                            console.log(`Adding filter dropdown for ${filterId}...`);
                            const select = document.createElement('select');
                            select.id = filterId;
                            select.className = 'form-select text-capitalize';
                            select.innerHTML = `<option value="">${placeholder}</option>`;

                            const targetElement = document.querySelector(containerClass);
                            if (targetElement) {
                                targetElement.appendChild(select);
                                console.log(`Select2 initialization for ${filterId}...`);
                                $(select).select2();

                                select.addEventListener('change', () => {
                                    const value = select.value ? `^${select.value}$` : '';
                                    r.column(columnIndex).search(value, true, false).draw();
                                });
                            } else {
                                console.error(`Container ${containerClass} not found for ${filterId}`);
                            }
                        };

                         // Initialize filters. They will appear but be empty of options by default.
                         // Ensure containers exist in base.blade.php
                        addFilterDropdown(3, '.user_role', 'UserRole', 'Select Role'); // Role filter
                        addFilterDropdown(4, '.user_plan', 'UserPlan', 'Select Plan'); // Plan filter
                        addFilterDropdown(6, '.user_status', 'FilterStatus', 'Select Status'); // Status filter

                        // The search input and buttons are handled by DataTable's layout feature
                        // and should be visible as configured in the layout section.
                    },
                });

                // Keep delete record logic if needed, adjusts for empty data
                 // This function might need access to the DataTable instance 'dataTable'
                function o(e) {
                    let t = document.querySelector(".dtr-expanded");
                    (t = e ? e.target.parentElement.closest("tr") : t) &&
                        dataTable.row(t).remove().draw();
                }

                 // Keep event listener setup for delete record if needed
                 // This function relies on the DataTable instance 'dataTable'
                function l() {
                    var e = document.querySelector(".datatables-users");
                    let t = document.querySelector(".dtr-bs-modal");
                    if (e && e.classList.contains("collapsed")) {
                        if (t) {
                            t.addEventListener("click", function (e) {
                                if (e.target.parentElement.classList.contains("delete-record")) {
                                    o();
                                    let closeButton = t.querySelector(".btn-close");
                                    if(closeButton) closeButton.click();
                                }
                            });
                        }
                    } else if (e) { // Check if e is not null
                         let tbody = e.querySelector("tbody");
                         if(tbody) { // Check if tbody exists
                            tbody.addEventListener("click", function (e) {
                                if (e.target.parentElement.classList.contains("delete-record")) {
                                    o(e);
                                }
                            });
                         }
                    }
                }
                 // Initialize event listeners
                l();

                // Re-initialize event listeners on modal show/hide if needed
                document.addEventListener("show.bs.modal", function (e) {
                    if(e.target.classList.contains("dtr-bs-modal")) l();
                });
                document.addEventListener("hide.bs.modal", function (e) {
                    if(e.target.classList.contains("dtr-bs-modal")) l();
                });

                 // Remove btn-secondary class from dt-buttons buttons
                // Assuming $ (jQuery) is available
                 if (typeof $ !== 'undefined') {
                     $(".dt-buttons > .btn-group > button").removeClass("btn-secondary");
                 }
            }

            // Keep setTimeout logic for applying classes if needed
            setTimeout(() => {
                [
                    { selector: ".dt-buttons .btn", classToRemove: "btn-secondary" },
                    {
                        selector: ".dt-search .form-control",
                        classToRemove: "form-control-sm",
                    },
                    { selector: ".dt-length .form-select", classToRemove: "form-select-sm", classToAdd: "ms-0" },
                    { selector: ".dt-length", classToAdd: "mb-md-6 mb-0" },
                    { selector: ".dt-search", classToAdd: "mb-md-6 mb-2" },
                    {
                        selector: ".dt-layout-end",
                        classToRemove: "justify-content-between",
                        classToAdd:
                            "d-flex gap-md-4 justify-content-md-between justify-content-center gap-4 flex-wrap mt-0",
                    },
                    { selector: ".dt-layout-start", classToAdd: "mt-0" },
                    { selector: ".dt-buttons", classToAdd: "d-flex gap-4 mb-md-0 mb-6" },
                    { selector: ".dt-layout-table", classToRemove: "row mt-2" },
                    { selector: ".dt-layout-full", classToRemove: "col-md col-12", classToAdd: "table-responsive" },
                ].forEach(({ selector: e, classToRemove: a, classToAdd: s }) => {
                    document.querySelectorAll(e).forEach((t) => {
                        if(a) a.split(" ").forEach((e) => t.classList.remove(e));
                        if(s) s.split(" ").forEach((e) => t.classList.add(e));
                    });
                });
            }, 100);

            // Keep form validation and phone mask logic for add user modal
            var i = document.querySelectorAll(".phone-mask");
            var c = document.getElementById("addNewUserForm");
            if (i && typeof formatGeneral !== 'undefined') { // Check if i and formatGeneral exist
                i.forEach(function (t) {
                    t.addEventListener("input", (e) => {
                        e = e.target.value.replace(/\D/g, "");
                        t.value = formatGeneral(e, { blocks: [3, 3, 4], delimiters: [" ", " "] });
                    });
                     // Assuming registerCursorTracker is defined elsewhere or not critical for basic UI demo
                     // if (typeof registerCursorTracker !== 'undefined') {
                     //    registerCursorTracker({ input: t, delimiter: " " });
                     // }
                });
            }

            // Assuming FormValidation is loaded and c exists
             if (typeof FormValidation !== 'undefined' && c) {
                 console.log('Initializing form validation...');
                 FormValidation.formValidation(c, {
                     fields: {
                         userFullname: { validators: { notEmpty: { message: "Please enter fullname " } } },
                         userEmail: { validators: { notEmpty: { message: "Please enter your email" }, emailAddress: { message: "The value is not a valid email address" } } },
                     },
                     plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap5: new FormValidation.plugins.Bootstrap5({ eleValidClass: "", rowSelector: function (e, t) { return ".form-control-validation"; } }), submitButton: new FormValidation.plugins.SubmitButton(), autoFocus: new FormValidation.plugins.AutoFocus() },
                 });
                 console.log('Form validation initialized successfully');
             }
        });
    });

    // Placeholder for formatGeneral if needed and not globally available in this context
    // You might need to define or include this function elsewhere in your project's assets
    // function formatGeneral(value, options) { console.warn("formatGeneral function not provided"); return value; }

     // Placeholder for registerCursorTracker if needed and not globally available in this context
    // You might need to define or include this function elsewhere in your project's assets
    // function registerCursorTracker(options) { console.warn("registerCursorTracker function not provided"); }

</script>
@endpush

@endsection