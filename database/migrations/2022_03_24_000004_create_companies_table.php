<?php

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
use App\Enums\ActiveStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Schema table name to migrate
     *
     * @var string
     */
    public $tableName = 'companies';

    /**
     * Run the migrations.
     *
     * @table companies
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name');
            $table->foreignUuid('address_id')->nullable()->index();
            $table->tinyInteger('active')->default(ActiveStatus::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
