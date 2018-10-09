<?php
declare(strict_types=1);


/**
 * Nextcloud - Dashboard App
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018, Maxence Lange <maxence@artificial-owl.com>
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */


namespace OCP\Dashboard;


use OCP\Dashboard\Model\IWidgetRequest;
use OCP\Dashboard\Model\IWidgetConfig;
use OCP\Dashboard\Model\IWidgetSetup;
use OCP\Dashboard\Model\IWidgetTemplate;

/**
 * @since 15.0.0
 *
 * Interface IDashboardWidget
 *
 * @package OCP\Dashboard
 */
interface IDashboardWidget {

	/**
	 * Should returns the (unique) Id of the widget.
	 *
	 * @since 15.0.0
	 *
	 * @return string
	 */
	public function getId(): string;

	/**
	 * Should returns the [display] name of the widget.
	 *
	 * @since 15.0.0
	 *
	 * @return string
	 */
	public function getName(): string;

	/**
	 * Should returns some text describing the widget.
	 * This description is displayed in the listing of the widget.
	 *
	 * @since 15.0.0
	 *
	 * @return string
	 */
	public function getDescription(): string;

	/**
	 * Must generate and return a IWidgetTemplate that define important stuff
	 * about the Widget: appId, icon, content, ...
	 *
	 * @since 15.0.0
	 *
	 * @return IWidgetTemplate
	 */
	public function getWidgetTemplate(): IWidgetTemplate;

	/**
	 * Must create and return a IWidgetSetup containing the general setup of
	 * the widget
	 *
	 * @since 15.0.0
	 *
	 * @return IWidgetSetup
	 */
	public function getWidgetSetup(): IWidgetSetup;

	/**
	 * This method is called when a widget is loaded on the dashboard.
	 * A widget is 'loaded on the dashboard' when one of these conditions
	 * occurs:
	 *
	 * - the user is adding the widget on his dashboard,
	 * - the user already added the widget on his dashboard and he is opening
	 *   the dashboard app.
	 *
	 * @since 15.0.0
	 *
	 * @param IWidgetConfig $settings
	 */
	public function loadWidget(IWidgetConfig $settings);

	/**
	 * method executed when the widget call the net.requestWidget() from
	 * the Javascript API.
	 *
	 * This is used by the frontend to communicate with the backend.
	 *
	 * @since 15.0.0
	 *
	 * @param IWidgetRequest $request
	 */
	public function requestWidget(IWidgetRequest $request);

}

