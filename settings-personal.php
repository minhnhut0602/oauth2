<?php
/**
 * @author Project Seminar "sciebo@Learnweb" of the University of Muenster
 * @copyright Copyright (c) 2017, University of Muenster
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 */

use OCA\OAuth2\AppInfo\Application;
use OCA\OAuth2\Db\ClientMapper;

$tmpl = new OCP\Template('oauth2', 'settings-personal');

$app = new Application();
$container = $app->getContainer();

/** @var ClientMapper $clientMapper */
$clientMapper = $container->query('OCA\OAuth2\Db\ClientMapper');

$userId = \OC::$server->getUserSession()->getUser()->getUID();

return $tmpl->fetchPage(['clients' => $clientMapper->findByUser($userId), 'user_id' => $userId]);
