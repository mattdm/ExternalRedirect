<?php
/* FedoraDocsRedirect - MediaWiki extension to allow redirects to https://docs.fedoraproject.org/
 * Copyright (C) 2018 Matthew Miller
 *
 * Based heavily on
 * ExternalRedirect - MediaWiki extension to allow redirects to external sites.
 * Copyright (C) 2013 Davis Mosenkovs
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

$messages = array();
$messages['en'] = array(
    'fedoradocsredirect-text' => 'This page redirects to the Fedora Docs site: [$1 $1]',
    'fedoradocsredirect-invalidsite' => '== Fedora Docs Redirect Error ==
You can only redirect to https://docs.fedoraproject.org/',
    'fedoradocsredirect-invalidurl' => '== Fedora Docs Redirect Error ==
This does not look like a URL. You can only redirect to https://docs.fedoraproject.org/',
);


$magicWords = array();
$magicWords['en'] = array(
    'fedoradocs' => array( 0, 'fedoradocs' ),
);
