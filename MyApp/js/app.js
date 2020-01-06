(function($, owner) {
	/*
	 * 用户登录
	 */
	var SERVER_URL = 'http://47.106.253.201/webApp/';
	//var SERVER_URL = 'http://192.168.137.1:8088/webApp/';
	owner.login = function(loginInfo, callback) {
		callback = callback || $.noop;
		loginInfo = loginInfo || {};
		loginInfo.account = loginInfo.account || '';
		loginInfo.password = loginInfo.password || '';

		if(loginInfo.account.length != 11) {
			return callback('手机号长度为11');
		}
		if(loginInfo.password.length < 6) {
			return callback('密码最短为 6 个字符');
		}
		$.ajax({
			type: "post",
			url: SERVER_URL + 'Login',
			async: true,
			data: {
				account: loginInfo.account,
				password: loginInfo.password,
			},
			timeout: 10000,
			success: function(data) {
				console.log('登录接口返回信息：' + JSON.stringify(data));
				if(data.code == 1) {
					var state = owner.getState();
					var settings = app.getSettings();
					state.login = true;
					state.userid = data.userid;
					state.Account = data.userid;
					console.log(data.userid);
					state.head = SERVER_URL + data.userimage;
					state.Name = data.name;
					state.userblance = data.userblance;
					state.userpoint = data.userpoint;
					settings.autoLogin = true;
					console.log(JSON.stringify(state));
					owner.setSettings(settings);
					console.log(JSON.stringify(settings));
					owner.setState(state);
					console.log('OK');
					return callback();
				} else if(data.code == 0) {
					return callback('用户名或密码错误');
				} else {
					return callback('用户不存在');
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				mui.toast('请检查网络状态！');
				console.log('登录接口异常信息：' + textStatus);

			}
		});
	};

	/*
	 * 新用户注册
	 */
	owner.reg = function(regInfo, callback) {
		callback = callback || $.noop;
		regInfo = regInfo || {};
		regInfo.account = regInfo.account || '';
		regInfo.password = regInfo.password || '';
		var re = /^1\d{10}$/;
		if(!re.test(regInfo.account) || regInfo.account.length == 0) {
			return callback('手机号码为空或格式不正确');
		}

		if(regInfo.password.length < 6) {
			return callback('密码最短需要 6 个字符');
		}

		var returnData;
		$.ajax({
			type: "post",
			url: SERVER_URL + 'Register',
			async: true,
			timeout: 30000,
			data: {
				account: regInfo.account,
				password: regInfo.password,

			},
			success: function(data) {
				if(data.code == 0) {
					return callback();
				} else {
					return callback(data.msg);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(textStatus);
			}
		});
	};

	var checkEmail = function(email) {
		email = email || '';
		return(email.length > 3 && email.indexOf('@') > -1);
	};

	/*
	 * 找回密码
	 */
	owner.forgetPassword = function(email, callback) {
		callback = callback || $.noop;
		if(!checkEmail(email)) {
			return callback('邮箱地址不合法');
		}
		return callback(null, '新的随机密码已经发送到您的邮箱，请查收邮件。');
	};

	/*
	 * 发送通知栏消息
	 */
	owner.SendNoticeBoard = function($id, $title, $content, callback) {
		var NotifyID = $id;
		var main = plus.android.runtimeMainActivity();
		var Context = plus.android.importClass("android.content.Context");
		var Noti = plus.android.importClass("android.app.Notification");
		var NotificationManager = plus.android.importClass("android.app.NotificationManager");
		var nm = main.getSystemService(Context.NOTIFICATION_SERVICE)
		var Notification = plus.android.importClass("android.app.Notification");
		var mNotification = new Notification.Builder(main);
		var Intent = plus.android.importClass("android.content.Intent");
		var PendingIntent = plus.android.importClass("android.app.PendingIntent");
		var intent = new Intent(main, main.getClass());
		var pendingIntent = PendingIntent.getActivity(main, 0, intent, PendingIntent.FLAG_CANCEL_CURRENT);
		var r = plus.android.importClass("android.R");
		/*mNotification.setOngoing(true);*/
		mNotification.setContentTitle($title);
		mNotification.setContentText($content);
		mNotification.setSmallIcon(r.drawable.ic_notification_overlay);
		mNotification.setTicker("PadInfo")
		mNotification.setContentIntent(pendingIntent);
		mNotification.setNumber(1);
		var mNb = mNotification.build();
		nm.notify(NotifyID, mNb);
	};

	/*
	 * base64保存至本地
	 */
	owner.baseImgFile = function(uid, base64, quality, callback) {
		quality = quality || 10;
		callback = callback || $.noop;
		var bitmap = new plus.nativeObj.Bitmap();
		// 从本地加载Bitmap图片
		bitmap.loadBase64Data(base64, function() {
			bitmap.save("_doc/" + uid + ".jpg", {
				overwrite: true,
				quality: quality
			}, function(i) {
				callback(i);
			}, function(e) {
				mui.alert('保存图片失败：' + JSON.stringify(e));
				console.log('保存图片失败：' + JSON.stringify(e));
			});
		}, function(e) {
			mui.alert('保存图片失败：' + JSON.stringify(e));
			console.log('加载图片失败：' + JSON.stringify(e));
		});
	}

	/*
	 * 获取当前状态
	 */
	owner.getState = function() {
		var stateText = localStorage.getItem('$state') || "{}";
		return JSON.parse(stateText);
	};

	/*
	 * 设置当前状态
	 */
	owner.setState = function(state) {
		state = state || {};
		localStorage.setItem('$state', JSON.stringify(state));
	};

	/*
	 * 设置应用本地配置
	 */
	owner.setSettings = function(settings) {
		settings = settings || {};
		localStorage.setItem('$settings', JSON.stringify(settings));
	}

	/*
	 * 获取应用本地配置
	 */
	owner.getSettings = function() {
		var settingsText = localStorage.getItem('$settings') || "{}";
		return JSON.parse(settingsText);
	}

	// 获取用户头像
	owner.getHeadImg = function() {
		var headImg = owner.getUserInfo().my_icon || "";
		return headImg;
	}

	//设置用户头像
	owner.setHeadImg = function(baseData) {
		var userInfo = owner.getUserInfo();
		userInfo.my_icon = baseData; //只对my_icon这一项进行修改，其他不动
		owner.setUserInfo(userInfo);
	}
}(mui, window.app = {}));