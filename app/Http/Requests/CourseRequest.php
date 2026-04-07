<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

            'price' => 'required|numeric|min:1|max:1000000000',

            'description' => 'required|string',

            'status' => 'required|in:draft,published',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'video_url' => 'nullable|url'
        ];
    }

    // 🔥 Thông báo tiếng Việt
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên khóa học',
            'name.max' => 'Tên khóa học quá dài',

            'price.required' => 'Vui lòng nhập giá',
            'price.numeric' => 'Giá phải là số',
            'price.min' => 'Giá phải lớn hơn 0',
            'price.max' => 'Giá quá lớn',

            'description.required' => 'Vui lòng nhập mô tả',

            'status.required' => 'Vui lòng chọn trạng thái',
            'status.in' => 'Trạng thái không hợp lệ',

            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Ảnh phải là jpg, jpeg hoặc png',
            'image.max' => 'Ảnh tối đa 2MB'
        ];
    }

    // 🔥 Việt hóa tên field
    public function attributes()
    {
        return [
            'name' => 'tên khóa học',
            'price' => 'giá',
            'description' => 'mô tả',
            'status' => 'trạng thái',
            'image' => 'ảnh'
        ];
    }
}