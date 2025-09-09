<div class="sidebar">
  <h4 class="fst-italic">Kategori</h4>
  <ol class="list-unstyled mb-0">
    @foreach (\App\Models\Category::all() as $cat)
      <li>
        <a href="{{ route('categories.show', $cat->slug) }}">{{ $cat->name }}</a>
      </li>
    @endforeach
  </ol>
</div>

<div class="sidebar">
  <h4 class="fst-italic">Tag Cloud</h4>
  <div class="tag-cloud">
    @foreach(explode(',', $article->tags) as $tag)
    <a href="{{ route('articles.tag', trim($tag)) }}">{{ trim($tag) }}</a>
    @endforeach
  </div>
</div>

<div class="sidebar">
  <h4 class="fst-italic">Newsletter</h4>
  <p>Daftar untuk mendapatkan update artikel terbaru langsung ke email Anda.</p>
  <form>
    <div class="mb-3">
      <input type="email" class="form-control" placeholder="Email Anda">
    </div>
    <button class="btn btn-primary w-100">Daftar</button>
  </form>
</div>
