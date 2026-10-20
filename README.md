# memo-labo static migration

`memo-labo.com` を PHP 実行なしの静的サイトへ移行するためのリポジトリです。

## 方針

- 現在の公開サイト（ロリポップ）は、切替確認が終わるまで変更しません。
- 記事本文・画像・CSS・GA4・広告・関連記事を静的HTMLへ変換します。
- 公開URLは原則として従来どおり `/dt.php` のような `.php` URLを維持します。
- 静的実体は `dt.html` として生成し、Cloudflare側で `/dt.php` → `/dt.html` を内部的に解決します。
- `/ctd.php/1000` のような不要な PATH_INFO は `/ctd.php` へ301リダイレクトします。

## ビルド

```bash
python tools/build_static.py SOURCE_DIR dist
```

`SOURCE_DIR` には現在の memo-labo.com のソース一式（`data.csv`, PHP記事, `images/`, `icon/`, CSS等）が必要です。

生成先 `dist/` には静的HTML、画像等のアセット、サイト内検索用データ、Cloudflare用 `_worker.js`、ビルドレポートが作られます。

## 本番切替前チェック

1. ビルドレポートで未変換PHPを確認する。
2. 主要記事（`dt.php`, `ocr.php`, `v0.php`, `dgr.php`, `sog.php` 等）の本文・画像・関連記事を比較する。
3. `/j/` 以下の記事と画像パスを確認する。
4. サイト内検索を確認する。
5. GA4・AdSenseの読み込みを確認する。
6. `.php` URLとPATH_INFOの挙動をCloudflareのテスト用ドメインで確認する。
7. 問題がないことを確認してから `memo-labo.com` の向き先を切り替える。
8. ロリポップは切替直後には解約せず、一定期間バックアップとして残す。

## 注意

DNSや本番ドメインは、テスト環境で確認が終わるまで変更しません。
