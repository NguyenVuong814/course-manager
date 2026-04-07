<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',         // tên khóa học
        'slug',         // đường dẫn
        'price',        // giá
        'description',  // mô tả
        'image',        // ảnh
        'status' ,       // trạng thái
        'video_url' 
    ];

    // 1 khóa học có nhiều bài học
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // 1 khóa học có nhiều đăng ký
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // quan hệ nhiều-nhiều với học viên
    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments');
    }

    // scope: khóa đã publish
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // scope: lọc theo khoảng giá
    public function scopePriceBetween($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}