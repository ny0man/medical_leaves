<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= 'Field <b><i>{field}</i></b> wajib diisi.';
$lang['form_validation_isset']			= 'Field <b><i>{field}</i></b> harus memiliki nilai.';
$lang['form_validation_valid_email']		= 'Perbaiki format alamat email untuk field <b><i>{field}</i></b>.';
$lang['form_validation_valid_emails']		= 'Perbaiki format alamat email untuk field <b><i>{field}</i></b>.';
$lang['form_validation_valid_url']		= 'Url pada field <b><i>{field}</i></b> tidak valid.';
$lang['form_validation_valid_ip']		= 'Alamat IP pada <b><i>{field}</i></b> tidak valid.';
$lang['form_validation_min_length']		= 'Minimal panjang karakter field <b><i>{field}</i></b> minimal sejumlah {param} karakter.';
$lang['form_validation_max_length']		= 'Field <b><i>{field}</i></b> tidak boleh melebihi jumlah {param} karakter.';
$lang['form_validation_exact_length']		= 'Field <b><i>{field}</i></b> harus sejumlah {param} karakter.';
$lang['form_validation_alpha']			= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter huruf saja.';
$lang['form_validation_alpha_numeric']		= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter alfa numerik.';
$lang['form_validation_alpha_numeric_spaces']	= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter alfa numerik dan spasi.';
$lang['form_validation_alpha_dash']		= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter alfa numerik, "_" dan "-".';
$lang['form_validation_numeric']		= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter angka.';
$lang['form_validation_is_numeric']		= 'Field <b><i>{field}</i></b> hanya boleh diisi dengan karakter angka.';
$lang['form_validation_integer']		= 'The <b><i>{field}</i></b> field must contain an integer.';
$lang['form_validation_regex_match']		= 'The <b><i>{field}</i></b> field is not in the correct format.';
$lang['form_validation_matches']		= 'The <b><i>{field}</i></b> field does not match the {param} field.';
$lang['form_validation_differs']		= 'The <b><i>{field}</i></b> field must differ from the {param} field.';
$lang['form_validation_is_unique'] 		= 'Field <b><i>{field}</i></b> harus unik.';
$lang['form_validation_is_natural']		= 'The <b><i>{field}</i></b> field must only contain digits.';
$lang['form_validation_is_natural_no_zero']	= 'The <b><i>{field}</i></b> field must only contain digits and must be greater than zero.';
$lang['form_validation_decimal']		= 'The <b><i>{field}</i></b> field must contain a decimal number.';
$lang['form_validation_less_than']		= 'The <b><i>{field}</i></b> field must contain a number less than {param}.';
$lang['form_validation_less_than_equal_to']	= 'The <b><i>{field}</i></b> field must contain a number less than or equal to {param}.';
$lang['form_validation_greater_than']		= 'The <b><i>{field}</i></b> field must contain a number greater than {param}.';
$lang['form_validation_greater_than_equal_to']	= 'The <b><i>{field}</i></b> field must contain a number greater than or equal to {param}.';
$lang['form_validation_error_message_not_set']	= 'Unable to access an error message corresponding to your field name <b><i>{field}</i></b>.';
$lang['form_validation_in_list']		= 'The <b><i>{field}</i></b> field must be one of: {param}.';
