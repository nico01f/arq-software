<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      /*
      | Areas
      */

      DB::table('area')->insert([
          'valor' => 'Radiología'
      ]);

      DB::table('area')->insert([
          'valor' => 'Traumatología'
      ]);

      DB::table('area')->insert([
          'valor' => 'Urgencia'
      ]);

      DB::table('area')->insert([
          'valor' => 'Cirugía'
      ]);

      DB::table('area')->insert([
          'valor' => 'Kinesiología'
      ]);

      DB::table('area')->insert([
          'valor' => 'Enfermería'
      ]);

      DB::table('area')->insert([
          'valor' => 'Farmacología'
      ]);

      /*
      | Especialidades de funcionario
      */

      DB::table('especialidad')->insert([
          'valor' => 'General'
      ]);

      DB::table('especialidad')->insert([
          'valor' => 'Enfermería'
      ]);


      DB::table('especialidad_area')->insert([
          'especialidad_id' => 1,
          'area_id' => 1
      ]);


      DB::table('especialidad_area')->insert([
          'especialidad_id' => 2,
          'area_id' => 6
      ]);

      /*
      | Estados de funcionario
      */

      DB::table('estado_funcionario')->insert([
          'valor' => 'Disponible'
      ]);

      DB::table('estado_funcionario')->insert([
          'valor' => 'No Disponible'
      ]);

      /*
      | Tipos de funcionario
      */

      DB::table('tipo_funcionario')->insert([
          'valor' => 'Médico Especialista'
      ]);


      /*
      | Doctor Especialista Kinesiología
      */

      DB::table('funcionario')->insert([
          'rut' => '111111111',
          'nombre' => str_random(10),
          'appelidop' => str_random(10),
          'appelidom' => str_random(10),
          'email' => str_random(10).'@hospital.com',
          'password' => bcrypt('secret'),
          'estado_funcionario_id' => 1,
          'especialidad_id' => 1,
          'tipo_funcionario_id' => 1,
      ]);

      /*
      | Enfermera
      */

      DB::table('funcionario')->insert([
          'rut' => '222222222',
          'nombre' => str_random(10),
          'appelidop' => str_random(10),
          'appelidom' => str_random(10),
          'email' => str_random(10).'@hospital.com',
          'password' => bcrypt('secret'),
          'estado_funcionario_id' => 1,
          'especialidad_id' => 2,
          'tipo_funcionario_id' => 1,
      ]);
    }
}
