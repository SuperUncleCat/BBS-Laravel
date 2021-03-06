<?php

namespace App\Http\Requests;

class TopicRequest extends Request
{
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'POST':
            {
                return [
                  'title' => 'required|min:2',
                  'body' => 'required|min:3',
                  'category_id' => 'required|numeric',
                ];
            }
            // UPDATE
            case 'PUT':
            {
                return [
                  'title' => 'required|min:2',
                  'body' => 'required|min:3',
                  'category_id' => 'required|numeric',
                ];
            }
            case 'PATCH':
            {
                return [
                  'title' => 'required|min:2',
                  'body' => 'required|min:3',
                  'category_id' => 'required|numeric',
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            };
        }
    }

    public function messages()
    {
        return [
            // Validation messages
        ];
    }
}
