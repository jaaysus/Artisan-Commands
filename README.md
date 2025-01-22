
# Exemples des commandes Artisan Make de Laravel avec du Code

### 1. `make:controller`
```bash
php artisan make:controller UserController --resource
```
Crée un contrôleur avec les méthodes CRUD standard.

**Exemple de Code (UserController) :**
```php
public function index() {
    return view('users.index', ['users' => User::all()]);
}

public function store(Request $request) {
    User::create($request->all());
    return redirect()->route('users.index');
}
```

---

### 2. `make:model`
```bash
php artisan make:model Post -mcr
```
Génère un modèle, une migration, un contrôleur et une ressource.

**Exemple de Code (Modèle Post) :**
```php
class Post extends Model {
    protected $fillable = ['title', 'content'];
}
```

---

### 3. `make:migration`
```bash
php artisan make:migration create_posts_table --create=posts
```
Crée une migration pour définir la table `posts`.

**Exemple de Migration :**
```php
public function up() {
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

---

### 4. `make:seeder`
```bash
php artisan make:seeder PostsTableSeeder
```
Génère une classe de seed pour la table `posts`.

**Exemple de Seed :**
```php
public function run() {
    Post::factory(10)->create();
}
```

---

### 5. `make:request`
```bash
php artisan make:request StorePostRequest
```
Crée une classe de requête pour valider les entrées.

**Exemple de Validation :**
```php
public function rules() {
    return [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];
}
```

---

### 6. `make:middleware`
```bash
php artisan make:middleware CheckUserRole
```
Génère un middleware pour filtrer les requêtes.

**Exemple de Middleware :**
```php
public function handle($request, Closure $next) {
    if (auth()->user()->role !== 'admin') {
        return redirect('home');
    }
    return $next($request);
}
```

---

### 7. `make:policy`
```bash
php artisan make:policy PostPolicy --model=Post
```
Crée une politique pour le modèle `Post`.

**Exemple de Politique :**
```php
public function update(User $user, Post $post) {
    return $user->id === $post->user_id;
}
```

---

### 8. `make:command`
```bash
php artisan make:command SendReportCommand --command=report:send
```
Génère une commande Artisan personnalisée.

**Exemple de Commande :**
```php
protected $signature = 'report:send';

public function handle() {
    $this->info('Rapport envoyé avec succès !');
}
```

---

### 9. `make:event`
```bash
php artisan make:event PostPublished
```
Crée une classe d'événement pour les notifications.

**Exemple d'Événement :**
```php
public $post;

public function __construct(Post $post) {
    $this->post = $post;
}
```

---

### 10. `make:job`
```bash
php artisan make:job ProcessPayment
```
Génère une classe de tâche pour les processus en arrière-plan.

**Exemple de Tâche :**
```php
public function handle() {
    // Logique de traitement des paiements
}
```

---

### 11. `make:listener`
```bash
php artisan make:listener SendPostNotification --event=PostPublished
```
Crée un listener pour l'événement `PostPublished`.

**Exemple de Listener :**
```php
public function handle(PostPublished $event) {
    // Logique d'envoi de notification
}
```

---

### 12. `make:mail`
```bash
php artisan make:mail WelcomeMail --markdown=emails.welcome
```
Crée une classe de mail avec un modèle Markdown.

**Exemple de Mail :**
```php
public function build() {
    return $this->markdown('emails.welcome');
}
```

---

### 13. `make:notification`
```bash
php artisan make:notification InvoicePaid --markdown=notifications.invoice
```
Génère une classe de notification avec un modèle Markdown.

**Exemple de Notification :**
```php
public function toMail($notifiable) {
    return (new MailMessage)->markdown('notifications.invoice');
}
```

---

### 14. `make:provider`
```bash
php artisan make:provider CustomServiceProvider
```
Crée une classe de fournisseur de service.

**Exemple de Fournisseur de Service :**
```php
public function register() {
    $this->app->singleton(SomeService::class);
}
```

---

### 15. `make:test`
```bash
php artisan make:test PostTest --unit
```
Génère une classe de test unitaire.

**Exemple de Test :**
```php
public function testPostCreation() {
    $this->assertDatabaseHas('posts', ['title' => 'Titre de Test']);
}
```

---

### 16. `make:channel`
```bash
php artisan make:channel PostChannel
```
Crée une classe de canal pour la diffusion.

**Exemple de Canal :**
```php
public function join(User $user, Post $post) {
    return $user->id === $post->user_id;
}
```

---

### 17. `make:exception`
```bash
php artisan make:exception CustomException --render --report
```
Génère une classe d'exception personnalisée avec les méthodes `render` et `report`.

**Exemple d'Exception :**
```php
public function report() {
    Log::error($this->getMessage());
}

public function render() {
    return response()->view('errors.custom', [], 500);
}
```

---

### 18. `make:factory`
```bash
php artisan make:factory PostFactory --model=Post
```
Crée une classe de fabrique pour générer des données fictives.

**Exemple de Fabrique :**
```php
public function definition() {
    return [
        'title' => $this->faker->sentence,
        'content' => $this->faker->paragraph,
    ];
}
```

---

### 19. `make:observer`
```bash
php artisan make:observer PostObserver --model=Post
```
Génère une classe d'observer pour les événements du modèle.

**Exemple d'Observer :**
```php
public function created(Post $post) {
    Log::info('Post créé : ' . $post->title);
}
```

---

### 20. `make:rule`
```bash
php artisan make:rule UppercaseRule
```
Crée une règle de validation personnalisée.

**Exemple de Règle :**
```php
public function passes($attribute, $value) {
    return strtoupper($value) === $value;
}
```

---

### 21. `make:resource`
```bash
php artisan make:resource PostResource --collection
```
Génère une classe de ressource pour les réponses API.

**Exemple de Ressource :**
```php
public function toArray($request) {
    return [
        'id' => $this->id,
        'title' => $this->title,
        'content' => $this->content,
    ];
}
```
