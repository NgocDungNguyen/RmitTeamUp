<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main';

// Admin
$route['admin'] = 'backend/B_Login/index';
$route['login-admin'] = 'backend/B_Login/login_admin';
$route['backend/home'] = 'backend/Home/index';
$route['backend/register/(:num)'] = 'backend/B_Register/list_user/$1';
$route['backend/register-status/(:num)/(:num)'] = 'backend/B_Register/status/$1/$2';
$route['backend/subject'] = 'backend/B_Subject/index';
$route['backend/subject-creat'] = 'backend/B_Subject/creat';
$route['backend/subject-creat-add'] = 'backend/B_Subject/add';
$route['backend/subject-edit/(:any)'] = 'backend/B_Subject/edit/$1';
$route['backend/subject-update/(:any)'] = 'backend/B_Subject/update/$1';
$route['backend/subject-delete/(:any)'] = 'backend/B_Subject/delete/$1';

$route['backend/packet'] = 'backend/B_Packet/list_user';
$route['backend/packet/change/(:any)/(:any)'] = 'backend/B_Packet/status/$1/$2';

//Frontent
$route['home'] = 'frontent/C_Home/index';
$route['load-num-noti-head'] = 'frontent/C_Home/load_num_noti_head';
$route['load-num-mess'] = 'frontent/C_Home/load_num_mess';
$route['load_user_friend'] = 'frontent/C_Jquery/load_user_friend';
$route['load-chat-friend'] = 'frontent/C_Jquery/load_messenger';
$route['load-chat-friend-search'] = 'frontent/C_Jquery/load_user_friend_search';
$route['load-messenger'] = 'frontent/C_Jquery/load_messenger';
$route['send-messenger/(:any)'] = 'frontent/C_Jquery/send_messenger/$1';
$route['load-messenger-info'] = 'frontent/C_Jquery/load_messenger_info';
$route['service_pack'] = 'frontent/C_Servicepack/index';
$route['service_pack/(:any)'] = 'frontent/C_Servicepack/packet/$1';
$route['service_pack/premium_plan'] = 'frontent/C_Servicepack/packet/$1';
$route['find-teammate'] = 'frontent/C_Find_Teammate/index';
$route['subject'] = 'frontent/C_Subject/index';
$route['subject-check'] = 'frontent/C_Subject/add';
$route['subject-edit/(:any)'] = 'frontent/C_Subject/edit/$1';
$route['subject-update/(:any)'] = 'frontent/C_Subject/update/$1';
$route['subject-delete/(:any)'] = 'frontent/C_Subject/delete/$1';
$route['setting'] = 'frontent/C_Setting/index';
$route['setting-edit-info-check'] = 'frontent/C_Profile/setting_edit_info_check';
$route['change-password'] = 'frontent/C_Profile/change_password';
$route['change-password-check'] = 'frontent/C_Profile/change_password_check';
$route['change-avatar'] = 'frontent/C_Profile/change_avatar';
$route['change-avatar-check'] = 'frontent/C_Profile/change_avatar_check';
$route['register'] = 'frontent/C_Register/index';
$route['register-check'] = 'frontent/C_Register/check';
$route['login'] = 'frontent/C_Login/index';
$route['login-check'] = 'frontent/C_Login/check';
$route['logout'] = 'frontent/C_Logout/logout';
$route['profile-active'] = 'frontent/C_Profile/index';
$route['profile-active-check'] = 'frontent/C_Profile/check';
$route['profile-waiting'] = 'frontent/C_Profile/waiting';
$route['profile-edit-images'] = 'frontent/C_Profile/edit_images';
$route['profile-edit-images-check'] = 'frontent/C_Profile/edit_images_check';
$route['profile-edit-info'] = 'frontent/C_Profile/edit_info';
$route['profile-edit-info-check'] = 'frontent/C_Profile/edit_info_check';


$route['groups']['GET'] = 'frontent/C_Groups/list_group';
$route['groups-request']['GET'] = 'frontent/C_Groups/group_request';
$route['groups-member-disagree']['GET'] = 'frontent/C_Groups/group_member_disagree';
$route['groups-member-agree']['GET'] = 'frontent/C_Groups/group_member_agree';
$route['groups-profile']['GET'] = 'frontent/C_Groups/profile_group';
$route['group-change-avatar']['GET'] = 'frontent/C_Groups/change_avatar_group';
$route['group-change-avatar-check']['POST'] = 'frontent/C_Groups/change_avatar_check_group';
$route['groups-add-member']['GET'] = 'frontent/C_Groups/add_member_group';
$route['groups-add-member-check']['POST'] = 'frontent/C_Groups/add_member_group_check';
$route['groups-members']['GET'] = 'frontent/C_Groups/member_group';
$route['groups-exit-member']['GET'] = 'frontent/C_Groups/groups_exit_member';
$route['groups-end']['GET'] = 'frontent/C_Groups/groups_end';
$route['groups-end-status']['GET'] = 'frontent/C_Groups/groups_end_status';
$route['groups-evaluate']['GET'] = 'frontent/C_Groups/groups_evaluate';
$route['groups-evaluate-check']['POST'] = 'frontent/C_Groups/groups_evaluate_check';
$route['groups-evaluate-edit']['GET'] = 'frontent/C_Groups/groups_evaluate_edit';
$route['groups-evaluate-update']['POST'] = 'frontent/C_Groups/groups_evaluate_update';
$route['groups-discussion']['GET'] = 'frontent/C_Groups/discussion_group';
$route['group_creat']['GET'] = 'frontent/C_Groups/creat_group';
$route['group_add']['POST'] = 'frontent/C_Groups/add_group';
$route['groups-edit']['GET'] = 'frontent/C_Groups/edit_group';
$route['groups-update']['POST'] = 'frontent/C_Groups/update_group';

$route['groups-content']['GET'] = 'frontent/C_Groupscontent/content_creat';
$route['groups-content-add']['POST'] = 'frontent/C_Groupscontent/content_add';
$route['groups-content-edit']['GET'] = 'frontent/C_Groupscontent/content_edit';
$route['groups-content-delete-attachments']['GET'] = 'frontent/C_Groupscontent/content_delete_attachments';
$route['groups-content-update']['POST'] = 'frontent/C_Groupscontent/content_update';
$route['groups-content-delete']['GET'] = 'frontent/C_Groupscontent/content_delete';


$route['messages']['GET'] = 'frontent/C_Messages/list_friend';
$route['friend-request']['GET'] = 'frontent/C_Friend/friend_request';
$route['friend-add']['GET'] = 'frontent/C_Friend/friend_add';
$route['friend-delete']['GET'] = 'frontent/C_Friend/friend_delete';
$route['cancel-friend-request']['GET'] = 'frontent/C_Profileuser/cancel_friend_request';
$route['add-friend']['GET'] = 'frontent/C_Profileuser/add_friend';
$route['profile'] = 'frontent/C_Profileuser/index';
$route['profile_user'] = 'frontent/C_Profileuser/user_me';

$route['(:any)'] = 'main/disconnect';
$route['(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)/(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'main/disconnect';
$route['(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'main/disconnect';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
