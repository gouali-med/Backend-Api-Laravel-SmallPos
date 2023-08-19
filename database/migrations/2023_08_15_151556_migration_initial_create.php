<?php

use App\Models\Category;
use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Taxe;
use App\Models\TypePayment;
use App\Models\UniteOfSale;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('Picture');
            $table->string('Name');
            $table->timestamps();
            $table->foreignIdFor(Taxe::class);

        });  

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('BarCode');
            $table->string('Name');
            $table->string('PicturePath');
            $table->float('PurchasPrice');
            $table->float('Price');
            $table->integer('StockAlerte');
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(UniteOfSale::class);

            $table->timestamps();
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('TypeClient');
            $table->string('Name');
            $table->string('Telephone');
            $table->string('Email');
            $table->string('Adresse');
            $table->string('ICE');
            $table->string('RC');
            $table->string('IF');
            $table->string('TP');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('PicturePath');
            $table->string('Name');
            $table->string('Telephone');
            $table->string('Email');
            $table->string('Siteweb');
            $table->string('Adresse');
            $table->string('ICE');
            $table->string('RC');
            $table->string('IF');
            $table->string('TP');
            $table->timestamps();
        });

        Schema::create('payment_clients', function (Blueprint $table) {
            $table->id();
            $table->dateTime('DateOperation');
            $table->float('Payed');
            $table->dateTime('DateEcheance');
            $table->timestamps();
             $table->foreignIdFor(TypePayment::class);
             $table->foreignIdFor(User::class);
             $table->foreignIdFor(Sale::class);

             
         
        });

        Schema::create('type_payments', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });


        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->float('Valeur');
            $table->timestamps();
        });

        Schema::create('unite_of_sales', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->timestamps();
        });

        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->dateTime('DateOperation');
            $table->float('TotalHT');
            $table->float('TotalTVA');
            $table->float('TotalTTC');
            $table->float('Solde');
            $table->float('Reste');
            $table->timestamps();
            $table->foreignIdFor(Client::class);
            $table->foreignIdFor(User::class);

            
        
        });

        Schema::create('details_sales', function (Blueprint $table) {
            $table->id();
            $table->float('Quantite');
            $table->float('Montant');
            $table->timestamps();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Sale::class);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');

        Schema::dropIfExists('clients');

        Schema::dropIfExists('companies');

        Schema::dropIfExists('payment_clients');

        Schema::dropIfExists('type_payments');

        Schema::dropIfExists('categories');

        Schema::dropIfExists('taxes');

        Schema::dropIfExists('unite_of_sales');

        Schema::dropIfExists('sales');

        Schema::dropIfExists('details_sales');

    }
};
