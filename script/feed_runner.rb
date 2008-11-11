start_time = Time.now
puts "start:#{start_time}"

SnsMyActivity.find(:all, :conditions => [" share is null  " ],:order => " updated_at desc ", :limit => 5000).each do |notice|
  begin
   current_time = Time.now
   if current_time - start_time > 9.minute
   puts "end by timeout"
   break
   end
   content = show_notice(notice)
    if notice.ltype != 10 
		res_note = notice.user.xn_session.invoke_method("xiaonei.notifications.send", 
														:to_ids => notice.to_xid, 
														:notification => content)

	end
    if notice.ltype != 11 and  notice.ltype != 12
		res_feed = notice.user.xn_session.invoke_method("xiaonei.feed.publishTemplatizedAction", 
														:title_data => { 
														}.to_json,
														:body_data => { 
														  :content => content
														}.to_json,
														:template_id => (rand(10)+1))
    end
    puts "#{current_time}: process user #{notice.user.id}:  #{res_feed.inspect} #{res_note.inspect}"
    
    notice.sented = true
	notice.noticed = true
    notice.save
  rescue Exception => exp
    puts "exp: #{exp.inspect}"
  end
end


