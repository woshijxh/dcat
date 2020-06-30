<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use App\Models\Nav;
use App\Models\Tag;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->article_title;
            $grid->article_tag;
            $grid->article_content;
            $grid->article_describe;
            $grid->article_click;
            $grid->article_show;
            $grid->article_sort;
            $grid->nav_id;
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
        return Show::make($id, new Article(), function (Show $show) {
            $show->id;
            $show->article_title;
            $show->article_tag;
            $show->article_content;
            $show->article_describe;
            $show->article_click;
            $show->article_show;
            $show->article_sort;
            $show->nav_id;
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
        return Form::make(new Article(), function (Form $form) {
            $form->display('id');
            $form->text('article_title')->rules('required');
            $form->tags('article_tag')->pluck('tag_content', 'id')->options(Tag::all());
            $form->text('article_describe');
            $form->markdown('article_content')->rules('required')->height('800');
            $form->text('article_click');
            $form->switch('article_show')->default(1)->rules('required');
            $form->number('article_sort')->default(100);
            $form->select('nav_id')->rules('required');
            $form->text('nav_id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
