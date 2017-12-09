<?php
/**
 * Created by PhpStorm.
 * User: hoangduy
 * Date: 12/9/17
 * Time: 10:40 AM
 */

namespace App\Repositories;

use App\Models\Mailbox;
class MailboxRepository
{
    protected $model;

    public function __construct(Mailbox $model)
    {
        $this->model = $model;
    }

    public function getAllMails()
    {
        return $this->model->where('trash',0)->orderBy('created_at','desc')->get();
    }

    public function getAllTrashes()
    {
        return $this->model->where('trash',1)->orderBy('created_at','desc')->get();
    }

    public function getInfoBasic()
    {
        return $this->model->getInfo();
    }

    public function getMail($id)
    {
        return $this->find($id);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id) {
        $model = $this->find($id);

        return $model->update($data);
    }

    public function destroy($id)
    {
        $model = $this->find($id);

        return $model->destroy($id);
    }
}