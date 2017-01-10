<?php   
    namespace AppBundle\Repository;
      
    use Doctrine\ORM\EntityRepository;
    
    class AdvertRepository extends EntityRepository
    {
        function advertsBymodelAndBrand ($model_id)
        {
            $query = $this->createQueryBuilder('a');

            $query
                ->innerJoin('a.model', 'm')
                ->where('m.id = :id')
                ->setParameter('id', $model_id);
            return $query
                ->getQuery()
                ->getResult();
        }
        
        function advertsByBrand($brand_id) {
            $query = $this->createQueryBuilder('a');
            $query
                ->innerJoin('a.model', 'm')
                ->innerJoin('m.brand', 'b')
                ->where('b.id = :id')
                ->setParameter('id', $brand_id);
            return $query
                ->getQuery()
                ->getResult();
            
        }
        
        function advertsClassBy($classValue, $model_id) {
            $query = $this->createQueryBuilder('a');
            if ($classValue == 1) {
            $query
                ->innerJoin('a.model', 'm')
                ->where('m.id = :id')
                ->setParameter('id', $model_id)
                ->orderBy('a.date', 'ASC');
            }
            elseif ($classValue == 2) {
                $query
                ->innerJoin('a.model', 'm')
                ->where('m.id = :id')
                ->setParameter('id', $model_id)
                ->orderBy('a.prices', 'ASC');
            }
            return $query
                ->getQuery()
                ->getResult();
                

        }
        
         }