<?php
/* Copyright (C) 2013 Laurent Destailleur  <eldy@users.sourceforge.net>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *	\file       htdocs/opensurvey/index.php
 *	\ingroup    opensurvey
 *	\brief      Home page of opensurvey area
 */

require_once('../main.inc.php');
require_once(DOL_DOCUMENT_ROOT."/core/lib/admin.lib.php");
require_once(DOL_DOCUMENT_ROOT."/core/lib/files.lib.php");

// Security check
if (!$user->rights->opensurvey->read) accessforbidden();

/*
 * View
 */

$langs->load("opensurvey");

llxHeader();

$nbsondages=0;
$sql='SELECT COUNT(*) as nb FROM '.MAIN_DB_PREFIX.'opensurvey_sondage';
$resql=$db->query($sql);
if ($resql)
{
	$obj=$db->fetch_object($resql);
	$nbsondages=$obj->nb;
}
else dol_print_error($db,'');

print_fiche_titre($langs->trans("OpenSurveyArea"));

echo $langs->trans("NoSurveysInDatabase",$nbsondages).'<br><br>'."\n";

llxFooter();

$db->close();
?>