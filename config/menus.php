<?php

return [
    [
        "active" => 'dashboard',
        "name" => "Dashboard",
        "route" => "get.admin.dashboard",
        "icon" => "fa fa-th-large",
    ],
    [
        "active" => 'category',
        "name" => "Category Manage",
        "route" => "category.index",
        "icon" => "fa fa-th-large",
        "child" => [
            [
                "name" => "List Category",
                "route" => "category.index",
            ],
            [
                "name" => "Create Category",
                "route" => "category.create",
            ]
        ]
    ],
    [
        "active" => 'product',
        "name" => "Product Manage",
        "route" => "product.index",
        "icon" => "fa fa-th-large",
        "child" => [
            [
                "name" => "List Product",
                "route" => "product.index",
            ],
            [
                "name" => "Create Product",
                "route" => "product.create",
            ]
        ]
    ],
    [
        "active" => 'banner',
        "name" => "Banner Manage",
        "route" => "banner.index",
        "icon" => "fa fa-th-large",
        "child" => [
            [
                "name" => "List Banner",
                "route" => "banner.index",
            ],
            [
                "name" => "Create Banner",
                "route" => "banner.create",
            ]
        ]
    ],
    [
        "active" => 'customer',
        "name" => "Customer Manage",
        "route" => "customer.index",
        "icon" => "fa fa-th-large",
        "child" => [
            [
                "name" => "List Customer",
                "route" => "customer.index",
            ],
            [
                "name" => "Create Customer",
                "route" => "customer.create",
            ]
        ]
    ],
    [
        "active" => 'setting',
        "name" => "Manage Setting",
        "route" => "setting.index",
        "icon" => "fa fa-th-large",
        "child" => [
            [
                "name" => "List Setting",
                "route" => "setting.index",
            ],
            [
                "name" => "Create Setting",
                "route" => "setting.create",
            ]
        ]
    ],
];