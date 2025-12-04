# 内田敬 ビデオグラファー コーポレートサイト

動画編集・撮影サービスを提供する内田敬さんのコーポレートサイトです。

## 本番URL

https://takashi-uchita.duckdns.org/

## 技術スタック

- **フレームワーク**: Laravel 12
- **フロントエンド**: Tailwind CSS, Vite
- **データベース**: SQLite
- **サーバー**: ConoHa VPS (Debian)
- **Webサーバー**: Nginx + PHP 8.4-FPM
- **SSL**: ZeroSSL

## デザインテーマ

3種類のデザインテーマから選択可能：

| デザイン | 説明 | URL |
|---------|------|-----|
| **Colorful** | カラフルなグラデーションデザイン | `/preview?design=colorful` |
| **Minimal** | シンプルでミニマルなデザイン | `/preview?design=minimal` |
| **Videographer** | ダークテーマのプロフェッショナルデザイン | `/preview?design=videographer` |

## URL構造

```
/                          → デモページ（デザイン選択画面）
/preview?design={design}   → ホームページ
/gallery?design={design}   → 実績ギャラリー
/pricing?design={design}   → 料金プラン
/contact?design={design}   → お問い合わせ
/admin                     → 管理画面
```

## 主要機能

### 公開ページ
- **ホーム**: 自己紹介、実績プレビュー、料金概要
- **実績ギャラリー**: ショート動画・横動画のポートフォリオ（カテゴリフィルター付き）
- **料金プラン**: サービス別の料金表示
- **お問い合わせ**: メール、電話、Chatworkへの連絡先

### 管理画面 (`/admin`)
- 動画管理（追加・編集・削除・並び替え・公開/非公開）
- 料金プラン管理
- お問い合わせ管理（ステータス管理・メモ機能）
- サイト設定（オーナー名、サイトタイトル等）

## ファイル構成

```
app/
├── Http/Controllers/
│   ├── HomeController.php      # ホーム・デモページ
│   ├── GalleryController.php   # 実績ギャラリー
│   ├── PricingController.php   # 料金プラン
│   ├── ContactController.php   # お問い合わせ
│   └── Admin/                  # 管理画面コントローラー
├── Models/
│   ├── Video.php               # 動画モデル
│   ├── PricingPlan.php         # 料金プランモデル
│   ├── Contact.php             # お問い合わせモデル
│   └── SiteSetting.php         # サイト設定モデル

resources/views/
├── layouts/
│   ├── public.blade.php          # Videographerレイアウト
│   ├── public-colorful.blade.php # Colorfulレイアウト
│   └── public-minimal.blade.php  # Minimalレイアウト
├── home.blade.php                # Videographerホーム
├── home-colorful.blade.php       # Colorfulホーム
├── home-minimal.blade.php        # Minimalホーム
├── gallery.blade.php             # Videographerギャラリー
├── gallery-colorful.blade.php    # Colorfulギャラリー
├── gallery-minimal.blade.php     # Minimalギャラリー
├── pricing.blade.php             # Videographer料金
├── pricing-colorful.blade.php    # Colorful料金
├── pricing-minimal.blade.php     # Minimal料金
├── contact.blade.php             # Videographerお問い合わせ
├── contact-colorful.blade.php    # Colorfulお問い合わせ
├── contact-minimal.blade.php     # Minimalお問い合わせ
├── demo.blade.php                # デザイン選択ページ
└── admin/                        # 管理画面ビュー
```

## デプロイ

### VPSへのデプロイ

```bash
# ファイル同期
rsync -avz --exclude='.git' --exclude='node_modules' --exclude='vendor' \
  --exclude='.env' --exclude='storage/logs/*' \
  /path/to/local/ root@163.44.114.42:/var/www/videographer/

# VPSでキャッシュクリア
ssh root@163.44.114.42 'cd /var/www/videographer && \
  php artisan view:clear && \
  php artisan config:clear && \
  php artisan route:clear && \
  chown -R www-data:www-data . && \
  systemctl restart php8.4-fpm'
```

## ローカル開発

```bash
# 依存関係インストール
composer install
npm install

# 環境設定
cp .env.example .env
php artisan key:generate

# データベースセットアップ
php artisan migrate
php artisan db:seed

# 開発サーバー起動
php artisan serve
npm run dev
```

## 連絡先情報

- **メール**: taritaritazutazu@gmail.com
- **電話**: 080-1264-8634
- **Chatwork**: https://www.chatwork.com/takana7

## ライセンス

このプロジェクトはプライベートです。
