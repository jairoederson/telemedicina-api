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
        $this->call(TypeDocumentTableSeed::class);
        $this->call(SystemOfflineSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DatatablesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(UbigeosTableSeeder::class);
        // $this->call(PatientTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        // $this->call(DoctorTableSeeder::class);
        $this->call(DiseasesTableSeeder::class);
        $this->call(SymptomTableSeeder::class);
        $this->call(DetSpecialitiesDiseasesTableSeeder::class);
        $this->call(SocialProvidersTableSeeder::class);
        $this->call(TypePhoneTableSeeder::class);
        $this->call(UserPhoneTableSeeder::class);
        // $this->call(TypeCardTableSeeder::class);
        $this->call(CategorySuggestionSeeder::class);
        $this->call(CategoryQuestionSeeder::class);
        $this->call(ConfigTableSeed::class);
        $this->call(ActiveMedicationTableSeeder::class);
        $this->call(CompanySeeder::class);
        // $this->call(AffiliateSeeder::class);
        // $this->call(RelationshipSeeder::class);

    }
}
