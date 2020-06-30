<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Nav;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class NavController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Nav(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->nav_title;
            $grid->nav_open;
            $grid->nav_sort;
            $grid->nav_pid;
            $grid->nav_route;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Nav(), function (Show $show) {
            $show->id;
            $show->nav_title;
            $show->nav_open;
            $show->nav_sort;
            $show->nav_pid;
            $show->nav_route;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Nav(), function (Form $form) {
            $form->display('id');
            $form->text('nav_title');
            $form->switch('nav_open')->default(1)->rules('required');
            $form->number('nav_sort')->default(100)->rules('required');
            $form->number('nav_pid')->default(0)->rules('required');
            $form->text('nav_route');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
