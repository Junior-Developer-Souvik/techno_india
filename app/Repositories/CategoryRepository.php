<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Collection;
use App\Models\JobCategory;
use App\Models\Blogs;
use App\Models\SocialMedia;
use App\Models\ContactUs;
use App\Models\Lead;
use App\Models\ContentAcademics;
use App\Models\SubAcademics;
use App\Models\Content_extracurricular;
use App\Models\order;
use App\Models\Unit;
use App\Models\Subject;

class CategoryRepository implements CategoryInterface
{


    // Collection
    public function listAll()
    {
        return Collection::latest()->where('deleted_at', 1)->get();
    }

    

    public function findById($id)
    {
        return Collection::findOrFail($id);
    }

    public function getSearchCollection(string $term)
    {
        return Collection::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }


    // Academics
    public function listAllContentAcademics()
    {
        return ContentAcademics::latest()->where('deleted_at', 1)->get();
    }
    public function findContentAcademicsById($id)
    {
        return ContentAcademics::findOrFail($id);
    }

    public function getSearchContentAcademics(string $term)
    {
        return ContentAcademics::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    //Sub Academics
    public function listAllSubAcademics($id)
    {
        return SubAcademics::latest()->where('content_academics_id', $id)->where('deleted_at',$id)->get();
    }
    public function findSubAcademicsById($id)
    {
        return SubAcademics::findOrFail($id);
    }

    public function getSearchSubAcademics(string $term)
    {
        return SubAcademics::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    //Social Media
    public function listAllSocialMedia()
    {
        return SocialMedia::latest()->where('deleted_at',1)->get();
    }
    public function findSocialMediaById($id)
    {
        return SocialMedia::findOrFail($id);
    }

    public function getSearchSocialMedia(string $term)
    {
        return SocialMedia::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    //Lead
    public function listAllLead()
    {
        return Lead::latest()->where('deleted_at',1)->get();
    }
    public function findLeadById($id)
    {
        return Lead::findOrFail($id);
    }

    public function getSearchLead(string $term)
    {
        return Lead::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    //Contact Us
    public function listAllContactUs()
    {
        return ContactUs::latest()->where('deleted_at',1)->get();
    }
    public function findContactUsById($id)
    {
        return ContactUs::findOrFail($id);
    }

    public function getSearchContactUs(string $term)
    {
        return ContactUs::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    
    //Blogs
    public function getSearchBlogs(string $term)
    {
        return Blogs::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    public function listAllBlogs()
    {
        return Blogs::latest()->where('deleted_at', 1)->get();
    }
    
    public function findBlogsById($id)
    {
        return Blogs::findOrFail($id);
    }

    //ExtraCurricular
    public function getSearchContent_extracurricular(string $term)
    {
        return Content_extracurricular::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    public function listAllContent_extracurricular()
    {
        return Content_extracurricular::latest()->where('deleted_at', 1)->get();
    }
    
    public function findContent_extracurricularById($id)
    {
        return Content_extracurricular::findOrFail($id);
    }

    // Units
    public function listAllUnits()
    {
        return Unit::latest()->where('deleted_at', 1)->get();
    }
    

    public function findUnitById($id)
    {
        return Unit::findOrFail($id);
    }


    public function getSearchUnit(string $term)
    {
        return Unit::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }
    // Subjects
    public function listAllSubjects()
    {
        return Subject::latest()->where('deleted_at', 1)->get();
    }
    

    public function findSubjectById($id)
    {
        return Subject::findOrFail($id);
    }

    public function getSearchSubject(string $term)
    {
        return Subject::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }

    // Job Category
    public function getSearchJobCategory(string $term){
        return JobCategory::where([['title', 'LIKE', '%' . $term . '%']])->where('deleted_at', 1)
        ->get();
    }
    public function listAllJobCategory(){
        return JobCategory::latest()->where('deleted_at', 1)->get();
    }
}
