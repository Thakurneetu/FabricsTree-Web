<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = ['name'];

  public function products()
  {
      return $this->belongsToMany(Product::class, 'product_tag');
  }
}

// // Attach Tags to a Product:
// $product = Product::find(1);
// $tags = [1, 2, 3]; // Tag IDs
// $product->tags()->attach($tags); // Associate tags with the product

// // Detach Tags:
// $product->tags()->detach([1, 2]); // Remove specific tags

// // Sync Tags (Add and Remove as Needed):
// $product->tags()->sync([1, 3, 4]); // Keeps only these tags

// // Get Related Products Based on Tags:
// $product = Product::find(1);
// $relatedProducts = Product::whereHas('tags', function ($query) use ($product) {
//     $query->whereIn('id', $product->tags->pluck('id'));
// })->where('id', '!=', $product->id)->get();
