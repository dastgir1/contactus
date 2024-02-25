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
 * Form for editing contact us  instances.
 * @copyright  2024  {@link http://paktaleem.com}
 * @package  local_contactus
 * @author    paktaleem
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
$PAGE->set_url('/local/contactus/contactus.php');
$PAGE->set_context(context_system::instance());
$PAGE->requires->js(new moodle_url('js/main.js'));
$PAGE->set_pagelayout('standard');

echo $OUTPUT->header();
// display html page from template
echo $OUTPUT->render_from_template('local_contactus/contactus', $templatecontext);

echo $OUTPUT->footer();              