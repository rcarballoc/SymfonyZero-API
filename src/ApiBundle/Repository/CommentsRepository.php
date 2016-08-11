<?php
namespace ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CommentsRepository extends EntityRepository
{

    public function searchComments($string){
        
    	$qb= $this->createQueryBuilder("e");
    		 
    	$query = $qb->select("e")
    		->where("e.comment LIKE :filtro")
    		->setParameter('filtro', '%'.$string.'%')
    		->getQuery();
        
        return $query->getArrayResult();
    }
    
    
    
    public function listComments($row_number){
        $max=1000;        
        $data=[];           
        $amount=(!empty($row_number))?$row_number:500;
        $amount=($amount>$max)?$max:$amount;
    	$qb= $this->createQueryBuilder("e");
    		 
    	$query = $qb->select("e")
                ->setMaxResults($amount)
    		->getQuery();
        
        return $query->getArrayResult();
    }
    
}
