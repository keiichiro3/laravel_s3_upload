// formから送信されたimgファイルを読み込む
$file = $request->file('post_img');
// 画像の拡張子を取得
$extension = $request->file('post_img')->getClientOriginalExtension();
// 画像の名前を取得
$filename = $request->file('post_img')->getClientOriginalName();
// 画像をリサイズ
$resize_img = Image::make($file)->resize(1200, 675)->encode($extension);
// s3のuploadsファイルに追加
$path = Storage::disk('s3')->put('/uploads/'.$filename,(string)$resize_img, 'public');
// 画像のURLを参照
$url = Storage::disk('s3')->url('uploads/'.$filename);
