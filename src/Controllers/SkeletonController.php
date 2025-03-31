<?php

namespace Danupe\Plugin\Skeleton\Controllers;

use Danupe\Core\Classes\Controller;
use Danupe\Plugin\User\Classes\Validate;
use Danupe\Plugin\Skeleton\Models\Skeleton;
use Psr\Http\Skeleton\ResponseInterface as Response;
use Psr\Http\Skeleton\ServerRequestInterface as Request;

class SkeletonController extends Controller
{
    public function index($request, $response)
    {
        $skeletons = new Skeleton();
        $skeletons = $skeletons->orderBy(['id' => 'asc'])->all(['`id`', '`text`']);
        danupe()->view()->get('plugin-skeleton', 'skeletons/index', ['skeletons' => $skeletons, 'title' => 'skeletons']);
        return $response;
    }

    public function edit($request, $response, $args)
    {
        $skeleton = new Skeleton();
        $skeleton = $skeleton->first(danupe()->data()->get($args, 'id'));
        danupe()->view()->get('plugin-skeleton', 'skeletons/edit', ['Skeleton' => $skeleton, 'title' => 'Edit Skeleton']);
        return $response;
    }

    public function update_post(Request $request, Response $response, array $args)
    {
        $validator = new Validate();

        $id = danupe()->input()->get('id');
        $rules = [];
        $rules = array_merge($rules, [
            'text' => 'required|string',
        ]);

        $validationResult = $validator->validate(danupe()->input()->all(), $rules);

        $data = danupe()->input()->only(['text', 'id']);

        if ($validationResult) {
            $skeleton = new Skeleton();
            $skeleton->update($data);
            return $this->redirectWithSuccess('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons/edit/' . $id, 'Skeleton updated successfully');
        } else {
            return $this->redirectWithErrors('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons/edit/' . $id, $validator->getErrors());
        }
    }

    public function create(Request $request, Response $response)
    {
        danupe()->view()->get('plugin-skeleton', 'skeletons/create', ['title' => 'Create']);
        return $response;
    }

    public function create_post(Request $request, Response $response)
    {

        $validator = new Validate();
        $rules = [
            'to' => 'text|string',
        ];

        $validationResult = $validator->validate(danupe()->input()->all(), $rules);


        $data = danupe()->input()->only(['text', 'id']);

        if ($validationResult) {
            $user = new Skeleton();
            $user->save($data);
            return $this->redirectWithSuccess('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons/create', 'Skeleton created successfully');
        } else {
            return $this->redirectWithErrors('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons/create', $validator->getErrors());
        }
    }

    public function delete_post(Request $request, Response $response, array $args)
    {
        $validator = new Validate();
        $rules = [
            'id' => 'required|integer',
        ];
        $validationResult = $validator->validate(danupe()->input()->only(['id']), $rules);
        $id = danupe()->data()->get(danupe()->input()->only(['id']), 'id');

        if ($validationResult) {
            $skeleton = new Skeleton();
            $skeleton->delete($id);
            return $this->redirectWithSuccess('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons', 'Skeleton deleted successfully');
        } else {
            return $this->redirectWithErrors('/' . danupe()->env()->get('DANUPE_ADMIN_PREFIX') . '/skeletons/edit/' . $id, $validator->getErrors());
        }
    }
}
