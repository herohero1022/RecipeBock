<html>
  <head>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <script src="{{ asset('js/app.js') }}" defer></script>
      <title>
        recipe/add
      </title>
  </head>
  <body>
    <div class="home-wrapper">
      <div class="home-header">
        <div class="header-contents">
          <div class="header-contents-top">
            <h2 class="header-contents-top-title">RecipeBock</h2>
            <div class="header-contents-top-serch">
              レシピを検索
              <i class="fas fa-search"></i>
            </div>
          </div>
          <div class="header-contents-bottom">
            <div class="header-contents-bottom-regibtn">
              新規会員登録
            </div>
            <div class="header-contents-bottom-loginbtn">
              ログイン
            </div>
          </div>
        </div>
      </div>
      <div class="preview-main-contents">
        <div class="preview-main-content">
          <div class="preview-main-content-title">
            <div class="title-box">
              <div class="recipe-title">
                {{$recipe->title}}
              </div>
              <div class="recipe-user">
                by {{$user->name}}
              </div>
            </div>
          </div>
          <div class="preview-main-content-recipe">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="image" style="width: 40%; hight: auto;"/>
            <div class="material-table-box">
              <div class="material-table-text">
                材料
              </div>
              <table class="material-table">
                @foreach($materials as $material)
                <tr>
                  <td>{{$material->ingredients}}</td>
                  <td>{{$material->quantity}}</td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <div class="preview-main-content-preview">
            <div class="main-content-preview-text">
              作り方
            </div>
            <div class="main-content-preview">
              @foreach($processes as $process)
              <div class="process-box">
                <div class="order-number">
                  {{$process->order}}
                </div>
                <div class="process-text">
                  {!!  nl2br($process->process) !!}
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <form method="POST" action="{{ route('recipe.preview_store') }}" class="prview-form">
            @csrf
            {{ method_field('patch') }}
            <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
            <input type="hidden" name="status" value="open">
            <button type="submit" class="preview-btn">
              レシピを公開する
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>