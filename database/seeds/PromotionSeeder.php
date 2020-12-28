<?php

use App\Promotion;
use App\Student;
use App\Module;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['B1','B2','B3','M1','M2'];
        $speciality = ['Informatique','Design','Marketing','Animation 3D','Audiovisuel'];

        for($i = 0; $i <= count($name)-1; $i++){
            for ($j = 0; $j <=count($speciality)-1; $j++){

                $promotion = Promotion::create(
                    [
                        'name' => $name[$i],
                        'speciality' => $speciality[$j]
                        ]
                    ); 
                    
                    $faker = Faker\Factory::create();
                    for ($x = 1; $x <=5; $x++){
                        $student = Student::create(
                            [
                                'promotion_id' => $promotion -> id,
                                'firstname' => $faker -> firstname,
                                'lastname' => $faker -> lastname,
                                'email' => $faker -> email
                            ]
                        );
                        
                        $module = Module::create(
                            [
                                'name' => $faker -> jobTitle,
                                'description' => $faker -> paragraph,
                                ]
                            );
                            
                            
                            DB::table('module_promotion')-> insert([
                                'module_id' => $module -> id,
                                'promotion_id' => $promotion -> id,
                                ]);
                                
                    }                
                            
                $students =  Student::orderBy('id', 'desc')->take(5)->get();     
                $modules = Module::orderBy('id', 'desc')->take(5)->get();                        
                foreach($students as $student){
                    $student -> module() -> attach($modules);
                }
                
            }
            


        }

    }
}
