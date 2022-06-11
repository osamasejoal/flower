<?php
use App\Models\CompanyInfo;
use App\Models\CompanySocial;
use App\Models\Message;

/*
|--------------------------------------------------------------------------
|                          COMPANY INFO METHOD
|--------------------------------------------------------------------------
*/
function company_info()
{
    return CompanyInfo::firstOrFail();
}



/*
|--------------------------------------------------------------------------
|                         COMPANY SOCIAL METHOD
|--------------------------------------------------------------------------
*/
function company_social()
{
    return CompanySocial::all();
}



/*
|--------------------------------------------------------------------------
|                         VIEWERS MESSAGE METHOD
|--------------------------------------------------------------------------
*/
function received_messages()
{
    return Message::all();
}



/*
|--------------------------------------------------------------------------
|                         UNREAD MESSAGE METHOD
|--------------------------------------------------------------------------
*/
function unread_messages()
{
    return Message::where('status', 1)->get();
}

?>