<?php

namespace App\Interfaces;

interface CategoryInterface {
    public function listAll();
    public function listAllBlogs();
    public function findById($id);
    public function getSearchJobCategory(string $term);
    public function getSearchBlogs(string $term);

    public function  getSearchContent_extracurricular(string $term);
    public function listAllContent_extracurricular();
    public function findContent_extracurricularById($id);

    public function listAllContentAcademics();
    public function findContentAcademicsById($id);
    public function getSearchContentAcademics(string $term);

    public function listAllSocialMedia();
    public function findSocialMediaById($id);
    public function getSearchSocialMedia(string $term);

    public function listAllLead();
    public function findLeadById($id);
    public function getSearchLead(string $term);

    public function listAllContactUs();
    public function findContactUsById($id);
    public function getSearchContactUs(string $term);

    
}
