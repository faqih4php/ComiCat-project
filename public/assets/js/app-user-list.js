document.addEventListener("DOMContentLoaded", function (e) {
    // Define config if not exists
    if (typeof config === 'undefined') {
        window.config = {
            colors: {
                borderColor: '#d9dee3',
                bodyBg: '#f5f5f9',
                headingColor: '#566a7f'
            }
        };
    }

    // Define assetsPath if not exists
    if (typeof assetsPath === 'undefined') {
        window.assetsPath = '/assets/';
    }

    let t = document.querySelector(".datatables-users");
    if (!t) {
        console.error('DataTable element not found!');
        return;
    }

    let r = "app-user-view-account.html";
    let n = {
        1: { title: "Pending", class: "bg-label-warning" },
        2: { title: "Active", class: "bg-label-success" },
        3: { title: "Inactive", class: "bg-label-secondary" },
    };

    // Initialize Select2 for Country filter
    let countrySelect = $("#country");
    if (countrySelect.length) {
        countrySelect.wrap('<div class="position-relative"></div>').select2({
            placeholder: "Select Country",
            dropdownParent: countrySelect.parent(),
        });
    }

    // Initialize DataTable with empty data
    let dataTable = new DataTable(t, {
        data: [], // Empty data array
        columns: [
            { data: "id" },
            {
                data: "id",
                orderable: !1,
                render: DataTable.render.select(),
            },
            { data: "full_name" },
            { data: "role" },
            { data: "current_plan" },
            { data: "billing" },
            { data: "status" },
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
                    selectAllRender: '<input type="checkbox" class="form-check-input">',
                },
                render: function () {
                    return '<input type="checkbox" class="dt-checkboxes form-check-input">';
                },
            },
            {
                targets: 2,
                responsivePriority: 3,
                render: function (e, t, a, s) {
                    return '<div class="d-flex justify-content-start align-items-center user-name"><div class="d-flex flex-column"><span class="fw-medium">-</span></div></div>';
                },
            },
            {
                targets: 3,
                render: function (e, t, a, s) {
                    return "<span class='text-truncate d-flex align-items-center text-heading'>-</span>";
                },
            },
            {
                targets: 4,
                render: function (e, t, a, s) {
                    return '<span class="text-heading">-</span>';
                },
            },
            {
                targets: 5,
                render: function (e, t, a, s) {
                    return '<span class="text-heading">-</span>';
                },
            },
            {
                targets: 6,
                render: function (e, t, a, s) {
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
                            text: "_MENU_",
                        },
                    },
                ],
            },
            topEnd: {
                features: [
                    {
                        search: {
                            placeholder: "Search User",
                            text: "_INPUT_",
                        },
                    },
                    {
                        buttons: [
                            {
                                extend: "collection",
                                className: "btn btn-label-secondary dropdown-toggle",
                                text: '<span class="d-flex align-items-center gap-2"><i class="icon-base bx bx-export icon-sm"></i> <span class="d-none d-sm-inline-block">Export</span></span>',
                                buttons: [
                                    {
                                        extend: "print",
                                        text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-printer me-2"></i>Print</span>',
                                        className: "dropdown-item",
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7],
                                        },
                                    },
                                    {
                                        extend: "csv",
                                        text: '<span class="d-flex align-items-center"><i class="icon-base bx bx-file me-2"></i>Csv</span>',
                                        className: "dropdown-item",
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7],
                                        },
                                    },
                                    {
                                        extend: "excel",
                                        text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-export me-2"></i>Excel</span>',
                                        className: "dropdown-item",
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7],
                                        },
                                    },
                                    {
                                        extend: "pdf",
                                        text: '<span class="d-flex align-items-center"><i class="icon-base bx bxs-file-pdf me-2"></i>Pdf</span>',
                                        className: "dropdown-item",
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7],
                                        },
                                    },
                                    {
                                        extend: "copy",
                                        text: '<i class="icon-base bx bx-copy me-1"></i>Copy',
                                        className: "dropdown-item",
                                        exportOptions: {
                                            columns: [3, 4, 5, 6, 7],
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
            searchPlaceholder: "Search User",
            paginate: {
                next: '<i class="icon-base bx bx-chevron-right icon-18px"></i>',
                previous: '<i class="icon-base bx bx-chevron-left icon-18px"></i>',
            },
        },
        responsive: {
            details: {
                display: DataTable.Responsive.display.modal({
                    header: function (e) {
                        return "Details";
                    },
                }),
                type: "column",
                renderer: function (e, t, a) {
                    var s = document.createElement("div");
                    s.classList.add("table-responsive");
                    var n = document.createElement("table");
                    s.appendChild(n);
                    n.classList.add("table");
                    var o = document.createElement("tbody");
                    o.innerHTML = a.map(function (e) {
                        return "" !== e.title
                            ? `<tr data-dt-row="${e.rowIndex}" data-dt-column="${e.columnIndex}">
                                <td>${e.title}:</td>
                                <td>${e.data}</td>
                            </tr>`
                            : "";
                    }).join("");
                    n.appendChild(o);
                    return s;
                },
            },
        },
        initComplete: function () {
            let r = this.api();

            // Function to add filter dropdowns
            const addFilterDropdown = (columnIndex, containerClass, filterId, placeholder) => {
                const select = document.createElement('select');
                select.id = filterId;
                select.className = 'form-select text-capitalize';
                select.innerHTML = `<option value="">${placeholder}</option>`;

                const targetElement = document.querySelector(containerClass);
                if (targetElement) {
                    targetElement.appendChild(select);
                    $(select).select2();

                    select.addEventListener('change', () => {
                        const value = select.value ? `^${select.value}$` : '';
                        r.column(columnIndex).search(value, true, false).draw();
                    });
                }
            };

            // Initialize filters
            addFilterDropdown(3, '.user_role', 'UserRole', 'Select Role');
            addFilterDropdown(4, '.user_plan', 'UserPlan', 'Select Plan');
            addFilterDropdown(6, '.user_status', 'FilterStatus', 'Select Status');
        },
    });

    // Delete record function
    function deleteRecord(e) {
        let t = document.querySelector(".dtr-expanded");
        t = e ? e.target.parentElement.closest("tr") : t;
        if (t) {
            dataTable.row(t).remove().draw();
        }
    }

    // Initialize event listeners
    function initEventListeners() {
        var e = document.querySelector(".datatables-users");
        let t = document.querySelector(".dtr-bs-modal");
        
        if (e && e.classList.contains("collapsed")) {
            if (t) {
                t.addEventListener("click", function (e) {
                    if (e.target.parentElement.classList.contains("delete-record")) {
                        deleteRecord();
                        let closeButton = t.querySelector(".btn-close");
                        if(closeButton) closeButton.click();
                    }
                });
            }
        } else if (e) {
            let tbody = e.querySelector("tbody");
            if(tbody) {
                tbody.addEventListener("click", function (e) {
                    if (e.target.parentElement.classList.contains("delete-record")) {
                        deleteRecord(e);
                    }
                });
            }
        }
    }

    // Initialize event listeners
    initEventListeners();

    // Re-initialize event listeners on modal show/hide
    document.addEventListener("show.bs.modal", function (e) {
        if(e.target.classList.contains("dtr-bs-modal")) initEventListeners();
    });
    document.addEventListener("hide.bs.modal", function (e) {
        if(e.target.classList.contains("dtr-bs-modal")) initEventListeners();
    });

    // Remove btn-secondary class from dt-buttons buttons
    if (typeof $ !== 'undefined') {
        $(".dt-buttons > .btn-group > button").removeClass("btn-secondary");
    }

    // Apply classes after a short delay
    setTimeout(() => {
        [
            { selector: ".dt-buttons .btn", classToRemove: "btn-secondary" },
            { selector: ".dt-search .form-control", classToRemove: "form-control-sm" },
            { selector: ".dt-length .form-select", classToRemove: "form-select-sm", classToAdd: "ms-0" },
            { selector: ".dt-length", classToAdd: "mb-md-6 mb-0" },
            { selector: ".dt-search", classToAdd: "mb-md-6 mb-2" },
            { selector: ".dt-layout-end", classToRemove: "justify-content-between", classToAdd: "d-flex gap-md-4 justify-content-md-between justify-content-center gap-4 flex-wrap mt-0" },
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
});
