<?php

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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 200)->notNullable();
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2)->notNullable();
            $table->integer('quantite')->notNullable()->default(0);
            $table->string('image_url', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total_prix', 10, 2)->notNullable();
            $table->enum('etat', ['en attente', 'payé', 'expédié', 'livré', 'annulé'])->default('en attente');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('commande_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commandes_id')->constrained()->onDelete('cascade');
            $table->foreignId('produits_id')->constrained()->onDelete('cascade');
            $table->integer('quantite')->notNullable();
            $table->decimal('prix', 10, 2)->notNullable();
            $table->timestamps(); 
        });

        Schema::create('facture', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commandes_id')->constrained()->onDelete('cascade');
            $table->enum('payment_mode', ['carte bancaire', 'paypal', 'mobile money', 'virement'])->notNullable();
            $table->enum('etat', ['en attente', 'réussi', 'échoué'])->default('en attente');
            $table->string('transaction_id', 100)->unique()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
        Schema::dropIfExists('commandes');
        Schema::dropIfExists('commande_details');
        Schema::dropIfExists('facture');
    }
};
