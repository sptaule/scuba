<?php

namespace App\Controllers;

use App\Models\Navigation;
use duncan3dc\Laravel\BladeInstance;
use Symfony\Component\Routing\RouteCollection;

class AppearanceController
{
    public function listPages(RouteCollection $routes)
    {
        $pages = Navigation::getPages();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._appearance.pages.index",
        [
            'title' => 'Liste des pages',
            'pages' => $pages,
        ]);
    }

    public function addPage(RouteCollection $routes)
    {
        if (is_post()) {
            Navigation::addPage($_POST);
        }
        $menus = Navigation::getMenus();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._appearance.pages.add",
        [
            'title' => 'Créer une page',
            'menus' => $menus,
        ]);
    }

    public function editPage(int $id, RouteCollection $routes)
    {
        if (is_post()) {
            Navigation::editPage($_POST, $id);
        }
        $page = Navigation::getPage($id);
        $menus = Navigation::getMenus();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._appearance.pages.edit",
        [
            'title' => "Modifier la page : <b>$page->name</b>",
            'page' => $page,
            'menus' => $menus
        ]);
    }

    public static function deletePage(int $id, RouteCollection $routes)
    {
        Navigation::deletePage($id);
    }

    public function listMenus(RouteCollection $routes)
    {
        $menus = Navigation::getMenus();
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._appearance.menus.index",
        [
            'title' => 'Liste des menus',
            'menus' => $menus,
        ]);
    }

    public function addMenu(RouteCollection $routes)
    {
        if (is_post()) {
            Navigation::addMenu($_POST);
        }
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render("admin.static._appearance.menus.add",
        [
            'title' => 'Créer un menu'
        ]);
    }

    public function editMenu(int $id, RouteCollection $routes)
    {
        if (is_post()) {
            Navigation::editMenu($_POST, $id);
        }
        $menu = Navigation::getMenu($id);
        $blade = new BladeInstance(APP_PATH . "/Views", BASE_PATH . "/cache/views");
        echo $blade->render(
        "admin.static._appearance.menus.edit",
        [
            'title' => "Modifier le menu : <b>$menu->name</b>",
            'menu' => $menu
        ]);
    }

    public static function deleteMenu(int $id, RouteCollection $routes)
    {
        Navigation::deleteMenu($id);
    }
}