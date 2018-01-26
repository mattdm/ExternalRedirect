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

if(!defined('MEDIAWIKI'))
    die();

$wgExtensionCredits[ 'parserhook' ][] = array(
    'path' => __FILE__,
    'name' => 'FedoraDocsRedirect',
    'author' => 'Matthew Miller',
    'url' => 'https://github.com/mattdm/FedoraDocsRedirect',
    'description' => 'Allows redirects to https://docs.fedoraproject.org/ (only)',
    'version' => '0.0.2',
);

$wgExtensionMessagesFiles['FedoraDocsredirect'] = dirname( __FILE__ ) . '/FedoraDocsRedirect.i18n.php';


$wgHooks['ParserFirstCallInit'][] = 'wfFedoraDocsRedirectParserInit';

function wfFedoraDocsRedirectParserInit( Parser $parser ) {
    $parser->setFunctionHook( 'fedoradocs', 'wfFedoraDocsRedirectRender');
    return true;
}

function wfFedoraDocsRedirectRender($parser, $url = '') {
    $parser->disableCache();
    $parsed = wfParseUrl($url);
    if ($parsed) {
        if (strpos($parsed['path']," ") or
            strpos($parsed['path'],":") or
            strpos($parsed['path'],"@")) {
            return wfMessage('fedoradocsredirect-invalidurl')->text();
        }
        else if ($parsed['host'] === 'docs.fedoraproject.org') {
            /* Note that the redirect URL omits any "query" portion.
             * This is intentional to discourage shenanigans.
             */
            header('Location: https://docs.fedoraproject.org' . $parsed['path'] . $parsed['fragment'],TRUE,301);
            return wfMessage('fedoradocsredirect-text', $url)->text();
        } else {
            return wfMessage('fedoradocsredirect-invalidsite')->text();
        }
    } else {
    }
}
