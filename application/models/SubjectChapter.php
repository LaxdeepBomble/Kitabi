<?php

class SubjectChapter extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->helper("url");
        $this->load->helper("form");
    }
    function getSubInfo()
    {
    //    $this->db->select("");
        $subjectNames=$this->db->get("subjects");
        
        if($subjectNames->num_rows()>0)
        {
            return $subjectNames;
        }
        else
            echo "here";
    }
    function getSubjectName($id)
    {
        $query="select name from subjects where id='".$id."'";
        $result_name=$this->db->query($query);
        if($result_name->num_rows()>0)
        {
            return $result_name->result_array()[0]['name'];
        }
    }
    function getChapterId($subject_id)
    {
        $query="select * from chapters where index_no=".$index_no." and sid=".$subject_id."";
        $result_id=$this->db->query($query);
        if($result_id->num_rows()>0)
        {
            return $result_id->result_array()[0]['id'];
        }
    }
    function getChapterName($chapterId)
    {
        $query="select name from chapters where id='".$chapterId."'";
        $chapterName=  $this->db->query($query);
        if(!empty($chapterName))
        {
            return $chapterName->result_array()[0]['name'];
        }
    }
    function getIndexNo($id)
    {
        $query = "select index_no from chapters where sid=".$id."";
        $index_no=$this->db->query($query);
        if($index_no)
            return $index_no;
        else
            return -1;
        
    }

    function createSection($data)
    {
        return $this->db->insert('chapters',$data);        
    }

    function createChapterContents($data)
    {
        return $this->db->insert('chapter_contents',$data);
    }

    function getChapters($subject_id)
    {
        $query = "select * from chapters where sid=".$subject_id." ORDER BY `index_no` ASC";
        $chapters = $this->db->query($query);
        if($chapters->num_rows()>0)
        {            
            return $chapters->result_array();           
        }
        return -1;
    }
    function getChapterContents($subject_id )//in case of where condition please provide cid and sid as an arguments
    {
//        $query="select * from chapter_contents where sid=".$sid." and cid=".$cid."";
//        $content_details=$this->db->query($query);
//        return $content_details;
        
          //getting all data
          $query="select * from chapter_contents where sid=".$subject_id." ORDER BY `index_no` ASC";
          $content_details = $this->db->query($query);
          return $content_details;
    }
}
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>