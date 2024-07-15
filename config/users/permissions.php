<?php

return [

    "permissions_function_names" => [
        #Users
        "users",
        "create_user",
        "edit_user",
        "delete_user",
        "status_user",
        "show_user",
        "export_users",

        #Tenders
        "tenders",
        "create_tender",
        "edit_tender",
        "delete_tender",
        "status_tender",
        "show_tender",
        "export_tenders",

        #Government Brokers
        "government_brokers",
        "create_government_broker",
        "edit_government_broker",
        "delete_government_broker",
        "status_government_broker",
        "show_government_broker",
        "export_government_brokers",

        #Tender Types
        "tender_types",
        "create_tender_type",
        "edit_tender_type",
        "delete_tender_type",
        "status_tender_type",
        "show_tender_type",
        "export_tender_types",

        #Cities
        "cities",
        "create_city",
        "edit_city",
        "delete_city",
        "status_city",
        "show_city",
        "export_cities",

        #Activities
        "activities",
        "create_activity",
        "edit_activity",
        "delete_activity",
        "status_activity",
        "show_activity",
        "export_activities",

        #Tags
        "tags",
        "create_tag",
        "edit_tag",
        "delete_tag",
        "status_tag",
        "show_tag",
        "export_tags",

        #Centers
        "centers",
        "create_center",
        "edit_center",
        "delete_center",
        "status_center",
        "show_center",
        "export_centers",

        #Sectors
        "sectors",
        "create_sector",
        "edit_sector",
        "delete_sector",
        "status_sector",
        "show_sector",
        "services_sector",
        "export_sectors",

        #Services
        "services",
        "create_service",
        "edit_service",
        "delete_service",
        "status_service",
        "show_service",
        "export_services",

        #Opportunities
        "opportunities",
        "create_opportunity",
        "edit_opportunity",
        "delete_opportunity",
        "status_opportunity",
        "show_opportunity",
        "export_opportunities",

        #Pricing Request
        "pricing_requests",
        "create_pricing_request",
        "edit_pricing_request",
        "delete_pricing_request",
        "status_pricing_request",
        "show_pricing_request",
        "export_pricing_requests",

        #Opportunity Notes
        "opportunity_notes",
        "create_opportunity_note",
        "edit_opportunity_note",
        "delete_opportunity_note",
        "status_opportunity_note",
        "show_opportunity_note",
        "export_opportunity_notes",

        #Units
        "units",
        "create_unit",
        "edit_unit",
        "delete_unit",
        "status_unit",
        "show_unit",
        "export_units",
    ],



    "permissions_names" => [
        "users" => [
            "users" => "المستخدمين",
            "create_user" => "إنشاء مستخدم",
            "edit_user" => "تعديل مستخدم",
            "delete_user" => "حذف مستخدم",
            "status_user" => "حالة المستخدم",
            "show_user" => "إظهار مستخدم",
            "export_users" => "تصدير المستخدمين",
        ],

        "tenders" => [
            "tenders" => "true",
            "create_tender" => "true",
            "edit_tender" => "true",
            "delete_tender" => "true",
            "status_tender" => "true",
            "show_tender" => "true",
            "export_tenders" => "true",
        ],

        "government_brokers" => [
            "government_brokers" => "true",
            "create_government_broker" => "true",
            "edit_government_broker" => "true",
            "delete_government_broker" => "true",
            "status_government_broker" => "true",
            "show_government_broker" => "true",
            "export_government_brokers" => "true",
        ],

        "tender_types" => [
            "tender_types" => "false",
            "create_tender_type" => "true",
            "edit_tender_type" => "true",
            "delete_tender_type" => "true",
            "status_tender_type" => "true",
            "show_tender_type" => "true",
            "export_tender_types" => "true",
        ],


        "cities" => [
            "cities" => "true",
            "create_city" => "true",
            "edit_city" => "true",
            "delete_city" => "true",
            "status_city" => "true",
            "show_city" => "true",
            "export_cities" => "true",
        ],

        "activities" => [
            "activities" => "true",
            "create_activity" => "true",
            "edit_activity" => "true",
            "delete_activity" => "true",
            "status_activity" => "true",
            "show_activity" => "true",
            "export_activities" => "true",
        ],

        "tags" => [
            "tags" => "true",
            "create_tag" => "true",
            "edit_tag" => "true",
            "delete_tag" => "true",
            "status_tag" => "true",
            "show_tag" => "true",
            "export_tags" => "true",
        ],

        "centers" => [
            "centers" => "true",
            "create_center" => "true",
            "edit_center" => "true",
            "delete_center" => "true",
            "status_center" => "true",
            "show_center" => "true",
            "export_centers" => "true",
        ],

        "sectors" => [
            "sectors" => false,
            "create_sector" => false,
            "edit_sector" => false,
            "delete_sector" => false,
            "status_sector" => false,
            "show_sector" => false,
            "export_sectors" => false,
        ],

        "services" => [
            "services" => false,
            "create_service" => false,
            "edit_service" => false,
            "delete_service" => false,
            "status_service" => false,
            "show_service" => false,
            "export_services" => false,
        ],

        "pricing_requests" => [
            "pricing_requests" => false,
            "create_pricing_request" => false,
            "edit_pricing_request" => false,
            "delete_pricing_request" => false,
            "status_pricing_request" => false,
            "show_pricing_request" => false,
            "export_pricing_requests" => false,
        ],

        "opportunity_notes" => [
            #Opportunity Notes
            "opportunity_notes" => false,
            "create_opportunity_note" => false,
            "edit_opportunity_note" => false,
            "delete_opportunity_note" => false,
            "status_opportunity_note" => false,
            "show_opportunity_note" => false,
            "export_opportunity_notes" => false,
        ],

        "units" => [
            "units" => false,
            "create_unit" => false,
            "edit_unit" => false,
            "delete_unit" => false,
            "status_unit" => false,
            "show_unit" => false,
            "export_units" => false,
        ]

    ],

    "superadmin" => [

        #Users
        "users" => true,
        "create_user" => true,
        "edit_user" => true,
        "delete_user" => true,
        "status_user" => true,
        "show_user" => true,
        "export_users" => true,

        #Tenders
        "tenders" => true,
        "create_tender" => true,
        "edit_tender" => true,
        "delete_tender" => true,
        "status_tender" => true,
        "show_tender" => true,
        "export_tenders" => true,

        #Government Brokers
        "government_brokers" => true,
        "create_government_broker" => true,
        "edit_government_broker" => true,
        "delete_government_broker" => true,
        "status_government_broker" => true,
        "show_government_broker" => true,
        "export_government_brokers" => true,

        #Tender Types
        "tender_types" => true,
        "create_tender_type" => true,
        "edit_tender_type" => true,
        "delete_tender_type" => true,
        "status_tender_type" => true,
        "show_tender_type" => true,
        "export_tender_types" => true,

        #Cities
        "cities" => true,
        "create_city" => true,
        "edit_city" => true,
        "delete_city" => true,
        "status_city" => true,
        "show_city" => true,
        "export_cities" => true,

        #Activities
        "activities" => true,
        "create_activity" => true,
        "edit_activity" => true,
        "delete_activity" => true,
        "status_activity" => true,
        "show_activity" => true,
        "export_activities" => true,

        #Tags
        "tags" => true,
        "create_tag" => true,
        "edit_tag" => true,
        "delete_tag" => true,
        "status_tag" => true,
        "show_tag" => true,
        "export_tags" => true,

        #Centers
        "centers" => true,
        "create_center" => false,
        "edit_center" => false,
        "delete_center" => false,
        "status_center" => true,
        "show_center" => true,
        "export_centers" => true,

        #Sectors
        "sectors" => true,
        "create_sector" => true,
        "edit_sector" => true,
        "delete_sector" => true,
        "status_sector" => true,
        "show_sector" => true,
        "services_sector" => true,
        "export_sectors" => true,

        #Services
        "services" => true,
        "create_service" => true,
        "edit_service" => true,
        "delete_service" => true,
        "status_service" => true,
        "show_service" => true,
        "export_services" => true,

        #Opportunities
        "opportunities" => true,
        "create_opportunity" => true,
        "edit_opportunity" => true,
        "delete_opportunity" => true,
        "status_opportunity" => true,
        "show_opportunity" => true,
        "export_opportunities" => true,

        #Pricing Request
        "pricing_requests" => true,
        "create_pricing_request" => true,
        "edit_pricing_request" => true,
        "delete_pricing_request" => true,
        "status_pricing_request" => true,
        "show_pricing_request" => true,
        "export_pricing_requests" => true,

        #Opportunity Notes
        "opportunity_notes" => true,
        "create_opportunity_note" => true,
        "edit_opportunity_note" => true,
        "delete_opportunity_note" => true,
        "status_opportunity_note" => true,
        "show_opportunity_note" => true,
        "export_opportunity_notes" => true,

        #Units
        "units" => true,
        "create_unit" => true,
        "edit_unit" => true,
        "delete_unit" => true,
        "status_unit" => true,
        "show_unit" => true,
        "export_units" => true,
    ],

    "admin" => [

        #Users
        "users" => false,
        "create_user" => false,
        "edit_user" => false,
        "delete_user" => false,
        "status_user" => false,
        "show_user" => false,
        "export_users" => false,

        #Tenders
        "tenders" => true,
        "create_tender" => true,
        "edit_tender" => true,
        "delete_tender" => true,
        "status_tender" => true,
        "show_tender" => true,
        "export_tenders" => true,

        #Government Brokers
        "government_brokers" => false,
        "create_government_broker" => false,
        "edit_government_broker" => false,
        "delete_government_broker" => false,
        "status_government_broker" => false,
        "show_government_broker" => false,
        "export_government_brokers" => false,

        #Tender Types
        "tender_types" => false,
        "create_tender_type" => false,
        "edit_tender_type" => false,
        "delete_tender_type" => false,
        "status_tender_type" => false,
        "show_tender_type" => false,
        "export_tender_types" => false,

        #Cities
        "cities" => false,
        "create_city" => false,
        "edit_city" => false,
        "delete_city" => false,
        "status_city" => false,
        "show_city" => false,
        "export_cities" => false,

        #Activities
        "activities" => false,
        "create_activity" => false,
        "edit_activity" => false,
        "delete_activity" => false,
        "status_activity" => false,
        "show_activity" => false,
        "export_activities" => false,

        #Tags
        "tags" => false,
        "create_tag" => false,
        "edit_tag" => false,
        "delete_tag" => false,
        "status_tag" => false,
        "show_tag" => false,
        "export_tags" => false,

        #Centers
        "centers" => false,
        "create_center" => false,
        "edit_center" => false,
        "delete_center" => false,
        "status_center" => false,
        "show_center" => false,
        "export_centers" => false,

        #Sectors
        "sectors" => false,
        "create_sector" => false,
        "edit_sector" => false,
        "delete_sector" => false,
        "status_sector" => false,
        "show_sector" => false,
        "services_sector" => false,
        "export_sectors" => false,

        #Services
        "services" => false,
        "create_service" => false,
        "edit_service" => false,
        "delete_service" => false,
        "status_service" => false,
        "show_service" => false,
        "export_services" => false,

        #Pricing Request
        "pricing_requests" => false,
        "create_pricing_request" => false,
        "edit_pricing_request" => false,
        "delete_pricing_request" => false,
        "status_pricing_request" => false,
        "show_pricing_request" => false,
        "export_pricing_requests" => false,

        #Opportunity Notes
        "opportunity_notes" => false,
        "create_opportunity_note" => false,
        "edit_opportunity_note" => false,
        "delete_opportunity_note" => false,
        "status_opportunity_note" => false,
        "show_opportunity_note" => false,
        "export_opportunity_notes" => false,

        #Units
        "units" => false,
        "create_unit" => false,
        "edit_unit" => false,
        "delete_unit" => false,
        "status_unit" => false,
        "show_unit" => false,
        "export_units" => false,
    ],

    "person" => [
        "users" => false,
        "create_user" => false,
        "edit_user" => false,
        "delete_user" => false,
        "status_user" => false,
        "show_user" => false,
        "export_users" => false,

        "tenders" => false,
        "create_tender" => false,
        "edit_tender" => false,
        "delete_tender" => false,
        "status_tender" => false,
        "show_tender" => false,
        "export_tenders" => false,

        "government_brokers" => false,
        "create_government_broker" => false,
        "edit_government_broker" => false,
        "delete_government_broker" => false,
        "status_government_broker" => false,
        "show_government_broker" => false,
        "export_government_brokers" => false,

        "tender_types" => false,
        "create_tender_type" => false,
        "edit_tender_type" => false,
        "delete_tender_type" => false,
        "status_tender_type" => false,
        "show_tender_type" => false,
        "export_tender_types" => false,

        "cities" => false,
        "create_city" => false,
        "edit_city" => false,
        "delete_city" => false,
        "status_city" => false,
        "show_city" => false,
        "export_cities" => false,

        "activities" => false,
        "create_activity" => false,
        "edit_activity" => false,
        "delete_activity" => false,
        "status_activity" => false,
        "show_activity" => false,
        "export_activities" => false,

        "tags" => false,
        "create_tag" => false,
        "edit_tag" => false,
        "delete_tag" => false,
        "status_tag" => false,
        "show_tag" => false,
        "export_tags" => false,

        "centers" => false,
        "create_center" => false,
        "edit_center" => false,
        "delete_center" => false,
        "status_center" => false,
        "show_center" => false,
        "export_centers" => false,

        "sectors" => false,
        "create_sector" => false,
        "edit_sector" => false,
        "delete_sector" => false,
        "status_sector" => false,
        "show_sector" => false,
        "export_sectors" => false,

        "services" => false,
        "create_service" => false,
        "edit_service" => false,
        "delete_service" => false,
        "status_service" => false,
        "show_service" => false,
        "export_services" => false,

        #Pricing Request
        "pricing_requests" => false,
        "create_pricing_request" => false,
        "edit_pricing_request" => false,
        "delete_pricing_request" => false,
        "status_pricing_request" => false,
        "show_pricing_request" => false,
        "export_pricing_requests" => false,

        #Opportunity Notes
        "opportunity_notes" => false,
        "create_opportunity_note" => false,
        "edit_opportunity_note" => false,
        "delete_opportunity_note" => false,
        "status_opportunity_note" => false,
        "show_opportunity_note" => false,
        "export_opportunity_notes" => false,

        #Units
        "units" => false,
        "create_unit" => false,
        "edit_unit" => false,
        "delete_unit" => false,
        "status_unit" => false,
        "show_unit" => false,
        "export_units" => false,

    ],

    "company" => [
        "users" => true,
        "create_user" => true,
        "edit_user" => true,
        "delete_user" => true,
        "status_user" => true,
        "show_user" => true,
        "export_users" => true,

        "tenders" => false,
        "create_tender" => false,
        "edit_tender" => false,
        "delete_tender" => false,
        "status_tender" => false,
        "show_tender" => false,
        "export_tenders" => false,

        "government_brokers" => false,
        "create_government_broker" => false,
        "edit_government_broker" => false,
        "delete_government_broker" => false,
        "status_government_broker" => false,
        "show_government_broker" => false,
        "export_government_brokers" => false,

        "tender_types" => false,
        "create_tender_type" => false,
        "edit_tender_type" => false,
        "delete_tender_type" => false,
        "status_tender_type" => false,
        "show_tender_type" => false,
        "export_tender_types" => false,

        "cities" => false,
        "create_city" => false,
        "edit_city" => false,
        "delete_city" => false,
        "status_city" => false,
        "show_city" => false,
        "export_cities" => false,

        "activities" => false,
        "create_activity" => false,
        "edit_activity" => false,
        "delete_activity" => false,
        "status_activity" => false,
        "show_activity" => false,
        "export_activities" => false,

        "tags" => false,
        "create_tag" => false,
        "edit_tag" => false,
        "delete_tag" => false,
        "status_tag" => false,
        "show_tag" => false,
        "export_tags" => false,

        "centers" => true,
        "create_center" => true,
        "edit_center" => true,
        "delete_center" => true,
        "status_center" => true,
        "show_center" => true,
        "export_centers" => true,

        "sectors" => false,
        "create_sector" => false,
        "edit_sector" => false,
        "delete_sector" => false,
        "status_sector" => false,
        "show_sector" => false,
        "services_sector" => false,
        "export_sectors" => false,

        "services" => false,
        "create_service" => false,
        "edit_service" => false,
        "delete_service" => false,
        "status_service" => false,
        "show_service" => false,
        "export_services" => false,

        #Opportunities
        "opportunities" => true,
        "create_opportunity" => true,
        "edit_opportunity" => true,
        "delete_opportunity" => true,
        "status_opportunity" => true,
        "show_opportunity" => true,
        "export_opportunities" => true,

        #Pricing Request
        "pricing_requests" => false,
        "create_pricing_request" => false,
        "edit_pricing_request" => false,
        "delete_pricing_request" => false,
        "status_pricing_request" => false,
        "show_pricing_request" => false,
        "export_pricing_requests" => false,

        #Opportunity Notes
        "opportunity_notes" => false,
        "create_opportunity_note" => false,
        "edit_opportunity_note" => false,
        "delete_opportunity_note" => false,
        "status_opportunity_note" => false,
        "show_opportunity_note" => false,
        "export_opportunity_notes" => false,

        #Units
        "units" => false,
        "create_unit" => false,
        "edit_unit" => false,
        "delete_unit" => false,
        "status_unit" => false,
        "show_unit" => false,
        "export_units" => false,
    ],

    "employee" => [
        "users" => false,
        "create_user" => false,
        "edit_user" => false,
        "delete_user" => false,
        "status_user" => false,
        "show_user" => false,
        "export_users" => false,

        "tenders" => false,
        "create_tender" => false,
        "edit_tender" => false,
        "delete_tender" => false,
        "status_tender" => false,
        "show_tender" => false,
        "export_tenders" => false,

        "government_brokers" => false,
        "create_government_broker" => false,
        "edit_government_broker" => false,
        "delete_government_broker" => false,
        "status_government_broker" => false,
        "show_government_broker" => false,
        "export_government_brokers" => false,

        "tender_types" => false,
        "create_tender_type" => false,
        "edit_tender_type" => false,
        "delete_tender_type" => false,
        "status_tender_type" => false,
        "show_tender_type" => false,
        "export_tender_types" => false,

        "cities" => false,
        "create_city" => false,
        "edit_city" => false,
        "delete_city" => false,
        "status_city" => false,
        "show_city" => false,
        "export_cities" => false,

        "activities" => false,
        "create_activity" => false,
        "edit_activity" => false,
        "delete_activity" => false,
        "status_activity" => false,
        "show_activity" => false,
        "export_activities" => false,

        "tags" => false,
        "create_tag" => false,
        "edit_tag" => false,
        "delete_tag" => false,
        "status_tag" => false,
        "show_tag" => false,
        "export_tags" => false,

        "centers" => true,
        "create_center" => true,
        "edit_center" => true,
        "delete_center" => true,
        "status_center" => true,
        "show_center" => true,
        "export_centers" => true,

        "sectors" => false,
        "create_sector" => false,
        "edit_sector" => false,
        "delete_sector" => false,
        "status_sector" => false,
        "show_sector" => false,
        "services_sector" => false,
        "export_sectors" => false,

        "services" => false,
        "create_service" => false,
        "edit_service" => false,
        "delete_service" => false,
        "status_service" => false,
        "show_service" => false,
        "export_services" => false,

        #Pricing Request
        "pricing_requests" => false,
        "create_pricing_request" => false,
        "edit_pricing_request" => false,
        "delete_pricing_request" => false,
        "status_pricing_request" => false,
        "show_pricing_request" => false,
        "export_pricing_requests" => false,

        #Opportunity Notes
        "opportunity_notes" => false,
        "create_opportunity_note" => false,
        "edit_opportunity_note" => false,
        "delete_opportunity_note" => false,
        "status_opportunity_note" => false,
        "show_opportunity_note" => false,
        "export_opportunity_notes" => false,

        #Units
        "units" => false,
        "create_unit" => false,
        "edit_unit" => false,
        "delete_unit" => false,
        "status_unit" => false,
        "show_unit" => false,
        "export_units" => false,
    ],



];
