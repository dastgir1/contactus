<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * TODO describe file form
 *
 * @package    local_contactus
 * @copyright  2023 YOUR NAME <your@email.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core_table\external\dynamic\get;
use tool_httpsreplace\form;

require('../../config.php');
$CFG->supportemail;
$CFG->supportname;
$CFG->allowedemaildomains;
global $DB, $USER;

$url = new moodle_url('/local/contactus/form.php', []);
$PAGE->set_url($url);
$PAGE->set_context(context_system::instance());

$PAGE->set_heading($SITE->fullname);
// for get user id
$userid=$USER->id;
// for get user data with userid
$user= core_user::get_user($userid);
// get data from form
$name=$_POST['name'];
$subject=$_POST['subject'];
$message= $_POST['message'];
$to=$user;
$from= $_POST['email'];
$body = "From: $name\n E-Mail:  $from\n Message: $message";
// send email to admin with user data and comments
if ($_POST['submit']) {
    if (email_to_user ($to, $subject,$from, $body)) {
        echo '<p>Your message has been sent!</p>';
        redirect(new moodle_url('/local/contactus/contactus.php'));
    } else {
        echo '<p>Something went wrong, go back and try again!</p>';
    }
}


