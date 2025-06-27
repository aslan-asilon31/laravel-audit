<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeAccount;
use App\Models\Marketplace;
use App\Models\MetaProperty;
use App\Models\Product;
use App\Models\ProductCategoryFirst;
use App\Models\ProductCategorySecond;
use App\Models\ProductContent;
use App\Models\ProductContentDisplay;
use App\Models\ProductContentFeature;
use App\Models\ProductContentMarketplace;
use App\Models\ProductContentMeta;
use App\Models\ProductMeta;
use App\Models\ProductMetaGroup;
use App\Models\ProductContentQna;
use App\Models\ProductContentReview;
use App\Models\ProductContentSpecification;
use App\Models\ProductContentVideo;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      MentorSeeder::class,
    
    ]);

   
  }
}
